<?php

namespace App\Http\Controllers;

use Bouncer;
use App\Variables;
use App\Processor;
use App\Http\Requests\CreateProcessorRequest;

class ProcessorsController extends Controller
{
    public function index()
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $processors = Processor::paginate(10);

        $this->setViewSharedVariables();

        return view('processor.index', compact('processors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $this->setViewSharedVariables();

        return view('processor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProcessorRequest $request)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        Processor::create($request->all());

        return redirect()->back()
           ->with('success', 'New Processor added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Processor $processor)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $this->setViewSharedVariables();

        return view('processor.show', compact('processor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Processor $processor)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $this->setViewSharedVariables();

        return view('processor.edit', compact('processor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProcessorRequest $request, Processor $processor)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $request->is_integrated ?: $request->merge(['is_integrated' => 0]);
        $processor->update($request->all());

        return redirect()->back()->with('success',
            'Processor was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Processor $processor)
    {
        if (!Bouncer::allows('manage-processors')) {
            abort(403);
        }

        $processor->delete();

        return redirect()->back()->with('success',
            'Processor was deleted successfully!');
    }

    public function setViewSharedVariables()
    {
        $proc = new Processor;
        $timezones = (new Variables)->getTimezones();
        $processorTypes = $proc->getProcessoryTypes();

        \View::share('timezones', $timezones);
        \View::share('processorTypes', $processorTypes);
    }
}
