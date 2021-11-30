<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        //$partners = Partner::simplePaginate (2)->partners();
        $total = User::find(Auth::id ())->partners()->count();
        $partners = User::find(Auth::id ())->partners()->simplePaginate(19);
        Debugbar::info($partners);
        Debugbar::addMessage('Another message', 'mylabel');
        return view('partners.index', compact('partners'))->with ('total', $total);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create ()
    {
        return view ('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store (Request $request)
    {
        $validated = $request->validate([
        /*$this->validate ($request, [*/
            'name' => 'required', 'max:255',
            'inn' => 'required',
        ]);

        $Partner = new Partner;
        $Partner->user_id = Auth::id ();
        $Partner->name = $request->input ('name');
        $Partner->inn = $request->input ('inn');
        $Partner->save ();
        return redirect ('partners')->with ('hisName', $Partner->name)->with ('success', 'успешно создан.');
        //ddd($validated);
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
        $currentRecord = Partner::where ('id', $id)->get();
        return view ('partners.edit', compact ('currentRecord'));
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
        $Partner = Partner::find ($id);
        if ($request->isMethod ('PUT'))
        {
            $Partner->name = $request->input('name');
            $Partner->inn = $request->input('inn');
            $Partner->save();
        }
        return redirect ('partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $Partner = Partner::find ($id);
        //Partner::find($id)->delete();
        Partner::destroy ($id);
        return redirect ('partners')->with ('hisName', $Partner->name)->with ('success', 'удален.');
    }
}
