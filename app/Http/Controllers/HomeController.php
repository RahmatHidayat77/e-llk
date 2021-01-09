<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
        $totalPegawai = DB::table('users')
            ->where('jabatan', '=', 'pegawai')
            ->count();
        $totalKasubag = DB::table('users')
            ->where('jabatan', '=', 'kasubag')
            ->count();
        $totalSekre = DB::table('users')
            ->where('jabatan', '=', 'sekretaris')
            ->count();

        return view('home', compact(["totalPegawai","totalKasubag","totalSekre"]));
    }
}
