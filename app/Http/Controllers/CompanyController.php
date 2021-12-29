<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Libraries\CompanyMethods;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $companies = User::find (Auth::id ())->companies ()->orderbyDesc('created_at')->Paginate (15);
        //return View::make ('partners.index', compact ('partners'))->with ('total', $total);
        return view ('companies.index', compact ('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view ('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {


        (new \App\Libraries\CompanyMethods)->MyValidate ($request);

        $Company = new Company;
        $Company->user_id = Auth::id ();

        $Company->fullname = $request->input ('fullname');
        $Company->name = $request->input ('name');

        $Company->inn = $request->input ('inn');
        $Company->kpp = $request->input ('kpp');
        $Company->ogrn = $request->input ('ogrn');

        $Company->address = $request->input ('address');
        $Company->email = $request->input ('email');
        $Company->phone = $request->input ('phone');
        $Company->site = $request->input ('site');
        $Company->head_position = $request->input ('head_position');
        $Company->head_name = $request->input ('head_name');
        $Company->accountant_position = $request->input ('accountant_position');
        $Company->accountant_name = $request->input ('accountant_name');

        $Company->bank_name = $request->input ('bank_name');
        $Company->bank_bik = $request->input ('bank_bik');
        $Company->bank_account = $request->input ('bank_account');
        $Company->account = $request->input ('account');

        $Company->information = $request->input ('information');

        $Company->save ();


        return redirect ('companies')->with ('hisName', $Company->name)->with ('success', 'успешно добавлена.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        //
    }
}
