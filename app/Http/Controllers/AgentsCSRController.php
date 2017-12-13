<?php

namespace App\Http\Controllers;

use App\Agent;
use App\AgentAccount;
use App\AgentCSR;
use App\Http\Requests\CreateAgentCSRRequest;
use App\Http\Requests\UpdateAgentCSRRequest;
use App\User;
use Illuminate\Http\Request;

class AgentsCSRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents_csr = AgentCSR::paginate(10);

        return view('agent_csr.index', compact('agents_csr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->agents();

        return view('agent_csr.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAgentCSRRequest $request)
    {
        AgentCSR::create($request->all());

        return redirect()->back()->with('success', 'New Agent CSR added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $csr = AgentCsr::findOrFail($id);

        return view('agent_csr.show', compact('csr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $csr = AgentCSR::findOrFail($id);
        $this->agents();

        return view('agent_csr.edit', compact('csr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentCSRRequest $request)
    {
        $csr = AgentCSR::findOrFail($request['user_id']);
        $csr->update($request->all());

        return redirect()->back()->with('success', 'Agent CSR updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $csr = AgentCSR::findOrFail($id);
        $csr->delete();

        return redirect()->back()->with('success',
            'Agent CSR deleted successfully'
        );
    }

    public function agents(  )
    {
        $agentList = AgentAccount::with('user')->get();

        \View::share('agentList', $agentList);
    }
}
