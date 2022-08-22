<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables;
use DB;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:view-roles', ['only' => ['index','show','listdata']]);
        // $this->middleware('permission:create-roles', ['only' => ['create']]);
        // $this->middleware('permission:edit-roles', ['only' => ['edit']]);
        // $this->middleware('permission:delete-roles', ['only' => ['destroy']]);
    }

    //=================================================================
    public function index()
    {
        return view('roles.index');
    }

    //=================================================================
    public function listdata(){
        return Datatables::of(DB::table('roles')
        ->select(DB::raw('roles.*,count(role_has_permissions.role_id) as total'))
        ->leftjoin('role_has_permissions','role_has_permissions.role_id','=','roles.id')
        ->groupby('roles.id')
        ->orderby('roles.id','desc')
        ->get())->make(true);
    }

    //=================================================================
    public function create()
    {
        $data_permission = DB::table('permissions')->orderby('id','desc')->get();
        return view('roles.create',compact('data_permission'));
    }

    //=================================================================
    public function store(Request $request)
    { 
        $role = Role::create(['name' => $request->input('nama')]);
        $role->syncPermissions($request->input('permission'));
        return redirect('roles')->with('status','Sukses menyimpan data');
    }

    //=================================================================
    public function show($id)
    {
        //
    }

    //=================================================================
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_id',$id)->get();
        return view('roles.edit',compact('role','permission','rolePermissions'));
    }

    //=================================================================
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->nama;
        $role->save();
        $role->syncPermissions($request->input('permission'));
        return redirect('roles')->with('status','Sukses memperbarui data');
    }

    //=================================================================
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        DB::table('role_has_permissions')->where('role_id',$id)->delete();
    }
}
