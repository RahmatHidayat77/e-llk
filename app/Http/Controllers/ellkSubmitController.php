<?php

namespace App\Http\Controllers;

use App\LembarKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ellkSubmitController extends Controller
{
    public function index()
    {
        $sidebar = "submit";
        $lks;

        if (Auth::user()->jabatan == 'kasubag') {   
            $lks = DB::table('lembar_kerjas')
            ->join('users','users.id' ,'=',  'lembar_kerjas.user_id')
            ->where('users.jabatan' ,'=', 'pegawai')
            ->orderBy('lembar_kerjas.created_at','desc')
            ->select('lembar_kerjas.id',
            'users.name',
            'users.nip',
            'users.jabatan',
            'lembar_kerjas.jam',
            'lembar_kerjas.jenis',
            'lembar_kerjas.kegiatan',
            'lembar_kerjas.catatan',
            'lembar_kerjas.verified',
            'lembar_kerjas.created_at'
            )
            ->get();
        } else if (Auth::user()->jabatan == 'sekretaris') {
            $lks = DB::table('lembar_kerjas')
            ->join('users','users.id' ,'=',  'lembar_kerjas.user_id')
            ->where('users.jabatan' ,'=', 'kasubag')
            ->orderBy('lembar_kerjas.created_at','desc')
            ->select('lembar_kerjas.id',
            'users.name',
            'users.nip',
            'users.jabatan',
            'lembar_kerjas.jam',
            'lembar_kerjas.jenis',
            'lembar_kerjas.kegiatan',
            'lembar_kerjas.catatan',
            'lembar_kerjas.verified',
            'lembar_kerjas.created_at'
            )
            ->get();
        }

        return view('ellk-submitted', compact(["lks","sidebar"]));
    }

    public function update($id,Request $request)
    {
            $lk = LembarKerja::find($id);
            $verified = false;

            if($request->verified == "true"){
                $verified = true;
            }
            $lk->verified = $verified;
            $lk->catatan = $request->catatan;
            $lk->save();


            return response()->json(['status'=>'success']);
    }

}
