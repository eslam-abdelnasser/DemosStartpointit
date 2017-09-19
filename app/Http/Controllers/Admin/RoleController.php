<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role ;
use App\Admin ;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $roles = Role::paginate(10);

        return view('admin.roles.index')->with('roles',$roles);
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
        $this->validate($request,array(
            'name' => 'required|string|max:255|unique:roles,name',
            'display_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ));

        $roles = new Role();
        $roles->name = $request->name ;
        $roles->display_name= $request->display_name;
        $roles->description = $request->description;
        $roles->save();
        session()->flash('message','added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //display all permissions in check boxs to assign
    public function displaypermission($role_id){

        $permissions = Permission::all();
        return view('admin.roles.addpermission')->with('permissions',$permissions)->with('role_id',$role_id);
    }


    //display all the role permissions with the option of delete
    public function display_role_permission($role_id){

        $role = Role::find($role_id);
        return view('admin.roles.role_permissions')->with('role',$role);
    }


    // assigne permissions to roles
    public function addpermission($role_id,Request $request){

        $role = Role::find($role_id);
        $role->permissions()->sync($request->permissions , false);
        return redirect()->back();
    }


    //delete spacific role from the admin roles
    public function delete_relation($admin_id,$role_id)
    {
        $admin = Admin::find($admin_id);
        $admin->roles()->detach($role_id);
        return redirect()->back();
    }
}
