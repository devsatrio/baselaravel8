<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use File;
use Hash;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-users', ['only' => ['index','show','listdata']]);
        $this->middleware('permission:create-users', ['only' => ['create']]);
        $this->middleware('permission:edit-users', ['only' => ['edit']]);
        $this->middleware('permission:delete-users', ['only' => ['destroy']]);
    }

    //=================================================================
    public function index()
    {
        return view('user.index');
    }

    //=================================================================
    public function listdata(){
        return Datatables::of(
            DB::table('users')
            ->select(DB::raw('users.*,roles.name as levelnama'))
            ->leftjoin('roles','roles.id','=','users.level')
            ->get())->make(true);
    }
    
    //=================================================================
    public function create()
    {   
        $roles = DB::table('roles')->orderby('id','desc')->get();
        return view('user.create',compact('roles'));
    }

    //=================================================================
    public function store(Request $request)
    {
        $newlevel = explode('-',$request->level);
        $usr = User::create([
            'name'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'level'=>$newlevel[0],
            'password'=>Hash::make($request->userpassword),
        ]);
        $usr->assignRole($newlevel[1]);
        
        return redirect('/users')->with('status','Sukses menyimpan data');
    }

    //=================================================================
    public function show($id)
    {
        //
    }

    //=================================================================
    public function edit($id)
    {
        $data = User::where('id',$id)->get();
        $roles = DB::table('roles')->orderby('id','desc')->get();
        return view('user.edit',['data'=>$data,'roles'=>$roles]);
    }

    //=================================================================
    public function update(Request $request, $id)
    {
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $newlevel = explode('-',$request->level);
        if($request->userpassword!=''){
            $usr = User::where('id',$id)
            ->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'email'=>$request->email,
                'level'=>$newlevel[0],
                'password'=>Hash::make($request->userpassword),
            ]);
            $usr = User::find($id);
            $usr->assignRole($newlevel[1]);
        }else{
            $usr = User::where('id',$id)
            ->update([
                'name'=>$request->nama,
                'username'=>$request->username,
                'email'=>$request->email,
                'level'=>$newlevel[0],
            ]);
            $usr = User::find($id);
            $usr->assignRole($newlevel[1]);
        }
        return redirect('/users')->with('status','Sukses memperbarui data');
    }

    //=================================================================
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    }
}
