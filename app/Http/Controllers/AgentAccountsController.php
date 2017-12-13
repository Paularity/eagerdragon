<?php

namespace App\Http\Controllers;

use Bouncer;
use App\User;
use App\Variables;
use App\AgentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateAgentRequest;
use App\Http\Requests\UpdateAgentRequest;

class AgentAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Bouncer::allows('manage-agents')) {
            abort(403);
        }

        $agents = User::whereHas('roles', function($q){
                $q->where('name', 'agent');
            })->paginate(10);

        return view('agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Bouncer::allows('manage-agents')) {
            abort(403);
        }

        $this->setTemplateVars();

        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Bouncer::allows('manage-agents')) {
            abort(403);
        }

        $request->merge([
            'password' => bcrypt(mt_rand(000000, 999999)),
            'created_by' => Auth::id(),
        ]);

        $user = User::create($request->all());

        $user->agentAccount()->create(
            $request->only((new AgentAccount)->getFillableFields())
        );

        Bouncer::assign('agent')->to($user);
        Bouncer::allow($user)->toManage($user);
        Bouncer::allow($user)->to(
            (new User)->getAbilitiesPerRole('agent')
        );

        return redirect()->back()
            ->with('success', 'New agent account added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $agentAccount)
    {
        if (!Bouncer::allows('manage-agents') &&
            !Bouncer::allows('view', $user)
            ) {
            abort(403);
        }

        $user = $agentAccount;
        return view('agent.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $agentAccount)
    {
        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('edit', $agent)
            ) {
            abort(403);
        }

        $user = $agentAccount;

        $this->setTemplateVars();

        return view('agent.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::findOrFail($request->user_id);

        if (!Bouncer::allows('manage-agents') &&
            !Bouncer::allows('edit', $user)
            ) {
            abort(403);
        }

        $user->update($request->all());

        $user->agentAccount()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only((new AgentAccount)->getFillableFields())
        );


        return redirect()->back()->with('success',
            'Agent account was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = User::findOrFail($id);

        if (!Bouncer::allows('manage-merchants') &&
            !Bouncer::allows('delete', $agent)
            ) {
            abort(403);
        }

        $agent->delete();

        return redirect()->back()->with('message', 'Agent was deleted successfully!');
    }

    private function setTemplateVars()
    {
        $variables = new Variables;
        $userPresetStatus = array_flip((new User())->getPresetSTatus());
        $timezones = $variables->getTimezones();
        $countryList = $variables->getCountriesList();
        $statesList = $variables->getStatesList();
        $businessType = $variables->getBusinessType();

        \View::share('userPresetStatus', $userPresetStatus);
        \View::share('timezones', $timezones);
        \View::share('countryList', $countryList);
        \View::share('statesList', $statesList);
        \View::share('businessType', $businessType);
    }
}
