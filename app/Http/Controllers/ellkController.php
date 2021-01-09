<?php

namespace App\Http\Controllers;

use App\LembarKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ellkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $llks = LembarKerja::all();
        return view('ellk');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from'   => 'required',
            'to'   => 'required',
            'kegiatan'  => 'required',
            'jenis' => 'required',
            'catatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if ($validator->fails()) {
            return Redirect::to('ellk')
            ->withErrors($validator);
        } else {
            // store
            $lk = new LembarKerja;
            $lk->user_id  = Auth::user()->id;
            $lk->jam      = $request->from." - ".$request->to;
            $lk->jenis    = $request->jenis;
            $lk->kegiatan = $request->kegiatan;
            $lk->catatan  = $request->catatan;
            $lk->verified = false;
            $lk->save();

            return Redirect::to('ellk')->with('success', 'Data berhasil disimpan!');
        }
    }
}
