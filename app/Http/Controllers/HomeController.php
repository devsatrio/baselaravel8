<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //===============================================================================
    public function index()
    {
        return view('home');
    }

    //===============================================================================
    public function editprofile()
    {
        $data = DB::table('users')->where('id',Auth::user()->id)->get();
        return view('user.editprofile',compact('data'));
    }

    //===============================================================================
    public function aksieditprofile(Request $request)
    {
        if($request->password==''){
            User::where('id',Auth::user()->id)
            ->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'email'=>$request->email,
            ]);
        }else{
            User::where('id',Auth::user()->id)
            ->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ]);
        }
        return redirect('home')->with('status','Sukses memperbarui profile');
    }
}
