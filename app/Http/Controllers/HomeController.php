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

         $lks = DB::table('lembar_kerjas')
            ->join('users','users.id' ,'=',  'lembar_kerjas.user_id')
            ->orderBy('lembar_kerjas.created_at','desc')
            ->select('lembar_kerjas.id',
            'users.name',
            'users.nip',
            'users.jabatan',
            'users.foto',
            'lembar_kerjas.jam',
            'lembar_kerjas.jenis',
            'lembar_kerjas.kegiatan',
            'lembar_kerjas.verified',
            'lembar_kerjas.created_at'
            )
            ->take(10)
            ->get();

            $lksCount= DB::table('lembar_kerjas')
                        ->count();

            $lksCountUnverified= DB::table('lembar_kerjas')
                        ->where('verified', '=', 0 )
                        ->count();

             $lksCountVerified= DB::table('lembar_kerjas')
                        ->where('verified', '=', 1 )
                        ->count();

            $getPercentProgress = ($lksCountVerified / $lksCount) * 100;

        return view('home',
        compact(["totalPegawai","totalKasubag","totalSekre","lks","lksCount","lksCountUnverified", "lksCountVerified","getPercentProgress"]));
    }
}
