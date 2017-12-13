<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLogoRequest;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingsRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('meta_key', '!=', 'company_logo')
                    ->paginate(10);
        $logo = Setting::where('meta_key', 'company_logo')
                    ->first();

        return view('setting.index', compact('settings', 'logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSettingRequest $request)
    {
        Setting::create($request->all());

        return redirect()->back()
            ->with('success', 'New settings added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request)
    {
        $setting = Setting::findOrFail($request->id);

        $setting->update($request->all());

        return redirect()->back()
            ->with('success', 'Settings was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);

        $setting->delete();

        return redirect()->back()
            ->with('message', 'Settings was deleted successfully!');

    }

    public function logoUpdate( UpdateLogoRequest $request )
    {
        $logo = Setting::where('meta_key', 'company_logo')
                    ->first();

        if (empty($logo)) {
            $file = $request->file('company_logo');
            $request->merge(['meta_key' => 'company_logo', 
                'meta_value' => $file->getClientOriginalName(),
            ]);

            Setting::create($request->all());
            $file->move( base_path() . '/public/resources/assets/logo/', $file->getClientOriginalName() );
        } else {
            unlink(base_path() . '/public/resources/assets/logo/'.$logo->meta_value);
            $file = $request->file('company_logo');
            $logo->meta_value = $file->getClientOriginalName();
            $logo->save();
            $file->move( base_path() . '/public/resources/assets/logo/', $file->getClientOriginalName() );
        }

        return redirect()->back()
            ->with('message', 'Logo was updated successfully!');
    }
}
