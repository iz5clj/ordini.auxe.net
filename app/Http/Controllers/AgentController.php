<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAgent;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::all();

        return view('agent.index')->with([
            'agents' => $agents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = new Agent;
        
        return view('agent.createModify')->with([
            'agent'  => $agent,
            'action' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgent $request)
    {
        $agent          = new Agent;
        $agent->nome    = $request->input('nome');
        $agent->cognome = $request->input('cognome');
        $agent->tel     = $request->input('tel');
        $agent->email   = $request->input('email');
        $agent->email2  = $request->input('email2');
        $agent->active  = $request->has('active') ? true : false;
        $agent->save();

        return redirect()
        ->route('agents.index')
        ->with('success','Agente creato corretamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return redirect()->route('agents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('agent.createModify')->with([
            'agent'  => $agent,
            'action' => 'modify'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAgent $request, Agent $agent)
    {
        $agent->nome    = $request->input('nome');
        $agent->cognome = $request->input('cognome');
        $agent->tel     = $request->input('tel');
        $agent->email   = $request->input('email');
        $agent->email2  = $request->input('email2');
        $agent->active  = $request->has('active') ? true : false;
        $agent->save();

        return redirect()
        ->route('agents.index')
        ->with('success','Agente modificato corretamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()
        ->route('agents.index')
        ->with('success','Agente eliminato.');
    }
}
