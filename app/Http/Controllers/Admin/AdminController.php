<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin ;
use Psy\Test\Exception\RuntimeExceptionTest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::paginate(10);
        return view('admin.admins.index')->with('admins',$admins);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');


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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'job_title' => 'required',
            'phone' => 'required',
//            'image_url' => 'required'
        ));

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->phone = $request->phone;
        $admin->job_title = $request->job_title;
        $admin->save();

        return redirect()->route('admins.index');

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
        $admin = Admin::find($id);
        return view('admin.admins.edit')->with('admin',$admin);
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
        $this->validate($request,array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
//            'image_url' => 'required'
        ));

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password != ""){
            $admin->password = bcrypt($request->password);
        }
        $admin->phone = $request->phone;
        $admin->job_title = $request->job_title;
        $admin->save();

        return redirect()->route('admins.index');
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

        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admins.index');


    }



    //display all roles so the admin can chose one or more
    public function displayroles($admin_id){
        $roles = Role::all();
        return view('admin.admins.addrole')->with('roles',$roles)->with('admin_id',$admin_id);

    }


    // assigne spacific roles for the admin
    public function addrole($admin_id,Request $request)
    {
        ;
        $admin = Admin::find($admin_id);
        $admin->roles()->sync($request->roles , false);
        return redirect()->back();

    }


    //display all the admin roles with the option of delete
    public function display_admin_role($admin_id)
    {
        $admin = Admin::find($admin_id);
        return view('admin.admins.admin_roles')->with('admin',$admin);
    }
}
