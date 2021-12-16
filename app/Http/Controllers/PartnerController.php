<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facade as DebugBar;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index (Request $request)

    {
        $rows = request('rows');

        if (!$rows AND !session('sessiont_rows')) {
            session()->put('sessiont_rows', 15);            //Присваеваем значение по-умолчанию
        }


        if (!$rows AND session('sessiont_rows')) {
            session()->put('sessiont_rows', session('sessiont_rows'));  //Если пользователь сделал выбор, то сохраняем в сессию
        }

        if ($rows == 15) {
            session()->put('sessiont_rows', 15);
        }

        if ($rows == 25) {
            session()->put('sessiont_rows', 25);
        }

        if ($rows == 50) {
            session()->put('sessiont_rows', 50);
        }


        //*****************************//
            Debugbar::warning('$rows = '. $rows . '. Сессия = ' . session('sessiont_rows') . '. Итоговое состояние (4 правило).'); //4
        //********************************//

        $total = User::find (Auth::id ())->partners ()->count ();
        $partners = User::find (Auth::id ())->partners ()->Paginate (session('sessiont_rows'));
        //return View::make ('partners.index', compact ('partners'))->with ('total', $total);
        return view ('partners.index', compact ('partners'))
            ->with ('total', $total)
            ->with ('session_rows', session('sessiont_rows'));
    }


    public function indexPerpage (Request $request)
    {
 /*       $rows = $request->input ('rows');

        $total = User::find (Auth::id ())->partners ()->count ();
        $partners = User::find (Auth::id ())->partners ()->simplePaginate ($rows);
        return view ('partners.index', compact ('partners'))->with ('total', $total)->with ('rows', $rows);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * //@return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
        $validated = $request->validate ([
            'name' => 'required', 'max:255',
            'inn' => 'required',
        ]);

        $rows = session('rows');

        $Partner = new Partner;
        $Partner->user_id = Auth::id ();
        $Partner->name = $request->input ('name');
        $Partner->inn = $request->input ('inn');
        $Partner->save ();

        $rows = session('rows');
        session()->put('rows', $rows);
        Debugbar::error('$rows = '. $rows . '. Сессия = ' . session('rows') . '. После записи в таблицу перед ридиректом.');

        return redirect ('partners')->with ('hisName', $Partner->name)->with ('success', 'успешно создан.')->with ('rows', session('rows'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit ($id)
    {
        $currentRecord = Partner::where ('id', $id)->get ();
        return view ('partners.edit', compact ('currentRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update (Request $request, $id)
    {
        $Partner = Partner::find ($id);
        if ($request->isMethod ('PUT')) {
            $Partner->name = $request->input ('name');
            $Partner->inn = $request->input ('inn');
            $Partner->save ();
        }
        return redirect ('partners');
    }


    public function destroyConfirmation ($id)
    {
        //Проверяем на предмет ручной подстановки параметра в URL

        if (Partner::find ($id) == null) { // Есть такая запись в принципе в таблице Партнеров?
            return response ('Forbidden (not for this user)', 403);
        } else {
            $partner = Partner::find ($id)->where ('user_id', Auth::id ())->find ($id); //если есть, то проверяем этого ли пользователя
        }

        if ($partner == NULL) {
            return response ('Forbidden (not for this partner)', 403);
        } else {
            //return view('partners.deleteConfirmation')->with('id', $id)->with ('name', Partner::find($id)->name);
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy ($id)
    {
        $partner = Partner::find ($id); /* Получаем id из URL */


        //ddd ($partner->id, $partner->name, $partner->user_id);
        //Partner::destroy($id);
        //return redirect('partners')->with('hisName', $partner->name)->with('success', 'удален.');

        //ddd($id);
        $Partner = Partner::find ($id)->where ('user_id', Auth::id ())->find ($id);

        if ($Partner === NULL or !$Partner) {
            return 'Fuck Off';
        } else {
            Partner::destroy ($id);
            return redirect ('partners')->with ('hisName', $Partner->name)->with ('success', 'удален.');
        }

    }
}
