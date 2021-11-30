<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Invoice;
use App\Models\User;
use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$partner = Partner::all();
        //$partners = new Partner;
        //$invoices = $partners->invoices()->get();

        //$total = User::find(Auth::id ())->invoices()->count();
        $invoices = User::find(Auth::id ())->invoices()->simplePaginate(19);

        //$total = User::find(Auth::id ())->partners()->count ();
        //$invoices = Partner::all()->invoices()->simplePaginate(19);
        //ddd($invoices);


        //Debugbar::info($partners);
        //Debugbar::addMessage('Another message', 'mylabel');
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            /*$this->validate ($request, [*/
            'name' => 'required', 'max:255',
        ]);

        $Invoice = new Invoice;
        $Partner = new Partner;
        $Invoice->user_id = Auth::id();
        $Invoice->partner_id = $request->input ('partner_id');
        $Invoice->name = $request->input ('name');
        $Invoice->save ();
        return redirect ('invoices')->with ('hisName', $Invoice->name)->with ('success', 'успешно создан.');
        //ddd($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$partner = Partner::find($id);
        //$invoices = $partner->invoices;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
