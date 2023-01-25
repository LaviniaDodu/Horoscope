<?php

namespace App\Http\Controllers;

use App\Exports\ExportHoroscope;
use App\Imports\ImportHoroscope;
use App\Models\Horoscope;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HoroscopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $horoscopes = Horoscope::whereNotNull('id')->orderBy('id', 'asc')->paginate(20);
        $signs = [
            'aries' => '03/21 - 04/19',
            'taurus' => '04/20 - 05/20',
            'gemini' => '05/21 - 06/21',
            'cancer' => '06/22 - 07/22',
            'leo' => '07/23 - 08/22',
            'virgo' => '08/23 - 09/22',
            'libra' => '09/23 - 10/23',
            'scorpio' => '10/24 - 11/21',
            'sagittarius' => '11/22 - 12/21',
            'capricorn' => '12/22 - 01/19',
            'aquarius' => '01/20 - 02/18',
            'pisces' => '02/19 - 03/20',
        ];
        return view('horoscope.index', compact('horoscopes', 'signs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horoscope  $horoscope
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($sign)
    {
        if (str_contains($sign, '-')) {
            $sign = Horoscope::getSign($sign);
        }
        $signs = [
            'aries' => '03/21 - 04/19',
            'taurus' => '04/20 - 05/20',
            'gemini' => '05/21 - 06/21',
            'cancer' => '06/22 - 07/22',
            'leo' => '07/23 - 08/22',
            'virgo' => '08/23 - 09/22',
            'libra' => '09/23 - 10/23',
            'scorpio' => '10/24 - 11/21',
            'sagittarius' => '11/22 - 12/21',
            'capricorn' => '12/22 - 01/19',
            'aquarius' => '01/20 - 02/18',
            'pisces' => '02/19 - 03/20',
        ];
        $horoscopes = Horoscope::where('sign', $sign)->whereNotNull('description')->orderBy('date', 'desc')->paginate(12);
        return view('horoscope.show', compact('horoscopes', 'sign', 'signs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function edit(Horoscope $horoscope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $horoscope = Horoscope::where('id', $id);
        $horoscope->update($request->except(['_token']));
        return redirect()->back()->with('message', "Record updated!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 'ALL') {
            Horoscope::truncate();
        } else {
            Horoscope::where('id', $id)->delete();
        }
        return redirect()->back()->with('message', "Record deleted, lost forever...");
    }

    public function import(Request $request) {
        if (Excel::import(new ImportHoroscope(), $request->file('file')->store('files'))) {
            $message = "File imported successfully!!!";
        } else {
            $message = "Ooopss... The import failed.";
        }
        return redirect()->back()->with('message', $message);
    }

    public function exportHoroscope(Request $request) {
        return Excel::download(new ExportHoroscope(), 'horoscopes.csv');
    }
}
