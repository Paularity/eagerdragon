<?php

namespace App\Http\Controllers;

use App\user;
use App\AgentAccount;
use App\BillingSchedule;
use App\MerchantAccount;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantAccount $merchantAccount, $processorId = null)
    {
        $user = $merchantAccount->user;
        $agentUser = User::where('id', $merchantAccount->affiliate_id)->first();
        $processors = $merchantAccount->processors()->get();

        $this->setTemplateVars();

        return view('fee.edit', [
            'processorId' => $processorId,
            'processors' => $processors,
            'user' => $user,
            'agent' => AgentAccount::where('user_id', $merchantAccount->affiliate_id)
                ->first(['business_name']),
            'merchantAccount' => $merchantAccount,
            'billingSchedule' => $user->billingSchedule()
                ->where('processor_id', $processorId)->first(),
            'bankFee' => $user->bankFee()
                ->where('processor_id', $processorId)->first(),
            'agentBankFee' => $agentUser ? $agentUser->bankFee()
                ->where('processor_id', $processorId)->first() : null,
            'antiFraudFee' => $user->antiFraudFee()
                ->where('processor_id', $processorId)->first(),
            'agentAntiFraudFee' => $agentUser ? $agentUser->antiFraudFee()
                ->where('processor_id', $processorId)->first() : null,
            'gatewayFee' => $user->gatewayFee()
                ->where('processor_id', $processorId)->first(),
            'agentGatewayFee' => $agentUser ? $agentUser->gatewayFee()
                ->where('processor_id', $processorId)->first() : null,
            'miscellaneousFee' => $user->miscellaneousFee()
                ->where('processor_id', $processorId)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        MerchantAccount $merchantAccount,
        $processorId
        )
    {
        $merchant = $merchantAccount->user;
        $agentUser = $merchantAccount->affiliate_id
                    ? User::where('id', $merchantAccount->affiliate_id)->first()
                    : null;
        $billingSched = BillingSchedule::where('user_id', $merchant->id)
            ->where('processor_id', $processorId)->first();

        if ($billingSched) {
            $billingSched->update($request->only([
                'billing_per_week', 'billing_period_1_starts_on',
                'billing_period_2_starts_on', 'time_to_settle'
            ]));
        } else {
            $request->merge([
                'user_id' => $merchant->id,
                'processor_id' => $processorId
            ]);

            BillingSchedule::create($request->all());
        }

        $merchant->antiFraudFee()->updateOrCreate(
            [
                'user_id' => $merchant->id,
                'processor_id' => $processorId
            ],
            $request->antiFraud['merchant']
        );
        $merchant->gatewayFee()->updateOrCreate(
            [
                'user_id' => $merchant->id,
                'processor_id' => $processorId
            ],
            $request->gateway['merchant']
        );
        $merchant->bankFee()->updateOrCreate(
            [
                'user_id' => $merchant->id,
                'processor_id' => $processorId
            ],
            $request->bank['merchant']
        );

        if ($agentUser) {
            $agentUser->antiFraudFee()->updateOrCreate(
                [
                    'user_id' => $agentUser->id,
                    'processor_id' => $processorId
                ],
                $request->antiFraud['agent']
            );
            $agentUser->gatewayFee()->updateOrCreate(
                [
                    'user_id' => $agentUser->id,
                    'processor_id' => $processorId
                ],
                $request->gateway['agent']
            );
            $agentUser->bankFee()->updateOrCreate(
                [
                    'user_id' => $agentUser->id,
                    'processor_id' => $processorId
                ],
                $request->bank['agent']
            );
        }

        return redirect()->back()->with('success', 'Record updated successfully!');
    }

    private function setTemplateVars($user = null)
    {
        \View::share('businessName', !$user
            ?: $user->businessInformation->business_name
        );
        \View::share('totalBillingPeriods', [1,2]);
        \View::share('timeToSettle', [1,2]);
        \View::share('reservePeriod', [4,5,6,7,8]);
        \View::share('days', [
                'sunday', 'monday', 'tuesday', 'wednesday',
                'thursday', 'friday', 'saturday',
            ]
        );
    }
}
