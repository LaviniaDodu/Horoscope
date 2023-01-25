<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $horoscopes = Horoscope::get();
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
        return view('home', compact('horoscopes', 'signs'));
    }
}
