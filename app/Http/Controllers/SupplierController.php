<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Countries;
use App\Http\Requests\StoreSupplier;
use App\Agent;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::with('agent')->get();

        return view('supplier.index')->with([
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check if any agent exists, if not return to agents list
        if (!Agent::count()) {
            return redirect()
            ->route('agents.index')
            ->with('warning','Devi inserire almeno un agente prima di creare un fornitore.');
        }

        $supplier  = new Supplier;
        $countries = Countries::getList('it', 'php');
        $agents    = Agent::all()->pluck('fullname', 'id')->toArray();
        $actualAgent = 0;

        return view('supplier.createModify')->with([
            'supplier'    => $supplier,
            'countries'   => $countries,
            'agents'      => $agents,
            'actualAgent' => $actualAgent,
            'action'      => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplier $request)
    {
        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $name = str_replace(' ', '', $request->input('nome'));
            $filename = $name . time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->fit(200)->save( public_path('/uploads/logo/' . $filename ) );
        } else {
            $filename = "default.png";
        }

        $supplier             = new Supplier;
        $supplier->nome       = $request->input('nome');
        $supplier->indirizzo1 = $request->input('indirizzo1');
        $supplier->indirizzo2 = $request->input('indirizzo2');
        $supplier->citta      = $request->input('citta');
        $supplier->cap        = $request->input('cap');
        $supplier->paese      = $request->input('paese');
        $supplier->tel        = $request->input('tel');
        $supplier->email      = $request->input('email');
        $supplier->agent_id   = $request->input('agent_id');
        $supplier->active     = $request->has('active') ? true : false;
        $supplier->logo       = $filename;
        $supplier->save();

        return redirect()
        ->route('suppliers.index')
        ->with('success','Fornitore creato corretamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return redirect()->route('suppliers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $countries   = Countries::getList('it', 'php');
        $agents      = Agent::all()->pluck('fullname', 'id')->toArray();
        $actualAgent = $supplier->agent_id;

        return view('supplier.createModify')->with([
            'supplier'    => $supplier,
            'agents'      => $agents,
            'countries'   => $countries,
            'actualAgent' => $actualAgent,
            'action'      => 'modify'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplier $request, Supplier $supplier)
    {
        if($request->hasFile('logo')){
            $logo     = $request->file('logo');
            $name     = str_replace(' ', '', $request->input('nome'));
            $filename = $name . time() . '.' . $logo->getClientOriginalExtension();

            Image::make($logo)->fit(200)->save( public_path('/uploads/logo/' . $filename ) );

            $supplier->logo = $filename;
        }

        $supplier->nome       = $request->input('nome');
        $supplier->indirizzo1 = $request->input('indirizzo1');
        $supplier->indirizzo2 = $request->input('indirizzo2');
        $supplier->citta      = $request->input('citta');
        $supplier->cap        = $request->input('cap');
        $supplier->paese      = $request->input('paese');
        $supplier->tel        = $request->input('tel');
        $supplier->email      = $request->input('email');
        $supplier->agent_id   = $request->input('agent_id');
        $supplier->active     = $request->has('active') ? true : false;
        
        $supplier->save();

        return redirect()
        ->route('suppliers.index')
        ->with('success','Fornitore modificato corretamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
        ->route('suppliers.index')
        ->with('success','Fornitore eliminato.');
    }
}
