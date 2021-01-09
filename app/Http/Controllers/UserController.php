<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use File;
use Image;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        return view('users.users');
    }

    public function getAllUser()
    {
        $users = DB::table('users')
            ->orderBy('created_at','desc')
            ->get();
            
        return view('users.users', compact("users"));
    }

    public function store(Request $request)
    {
        $user = new User();
        $path = 'uploads/users/';


        $user->name = $request->input('fullname');
        $user->nip = $request->input('nip');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->jabatan = $request->input('jabatan');

        if($request->hasfile('file') ) {
            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            \Image::make($image)->save( public_path($path . $filename ) );
            $user->foto = env('APP_URL') . '/uploads/users/' . $filename;
        } else {
            $user->foto = '';
        }

        $user->save();

        return response()->json(['status'=>'success']);
    }
}
