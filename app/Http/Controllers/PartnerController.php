<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
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
        //$partners = Partners::simplePaginate (2)->partners();

        $partners = User::find(Auth::id ())->partners()->simplePaginate(10);
        return view('partners.index', compact('partners'));
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

        $this->validate ($request, [
            'name' => 'required|max:255',
            'inn' => 'required',
        ]);

        $Partner = new Partners;

        $Partner->user_id = Auth::id ();
        $Partner->name = $request->input ('name');
        $Partner->inn = $request->input ('inn');
        $Partner->save ();
        return redirect ('partners')->with ('success', 'Контрагент ' . $Partner->name . ' добавлен.');
        //return back()->with('success', 'Контрагент добавлен.');
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
        $currentRecord = Partners::where ('id', $id)->get();
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
        $Partner = Partners::find ($id);
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
        $Partner = Partners::find ($id);
        //Partners::find($id)->delete();
        Partners::destroy ($id);
        return redirect('partners')->with('success', 'Контрагент ' . $Partner->name. ' удален.');
    }
}
