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
    public function createForPartners($id)
    {
        $name = Partner::find($id)->where('user_id', 'LIKE', '%' . Auth::id() . '%')->find($id);
        ddd ($name);
        if (!$name) {
            return 'Fuck Off';
        } else {
            session(['partner_id' => $id]);
            return view('invoices.create', compact($name));
        }
    }
        public function create() {

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
            'name' => 'required', 'max:255',
        ]);

        $Invoice = new Invoice;

        $Invoice->user_id = Auth::id();
        $Invoice->partner_id = session()->pull('partner_id'); /* Извлекает из сессии с удалением */
        $Invoice->name = $request->input ('name');
        $Invoice->save ();

        return redirect ('invoices')->with ('hisName', $Invoice->name)->with ('success', 'успешно создан.');
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
