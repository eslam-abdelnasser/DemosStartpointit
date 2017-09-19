<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission ;
use Illuminate\Support\Facades\Route;
class PermissionController extends Controller
{
    //

    // this class is build to find all system route and push them to permission table in the database
    // if the permission table is empty then call find all system route to find all route
    // then add them to the permmision table using create_permission_table() function
    // then when you try to access the index function it will check if you add new routes to your system by calling
    // check_new_route();
    // if the function find new route it will add it to the database
    // WARRNING create_new_permission function just detect the routes with name"yout_route.index,show,edit,create,destroy"

    public function index(){
//        dd($this->find_system_route());
        $string = 'admins.index';
        $permissions = Permission::paginate('10');

        if(isset($permissions) && count($permissions)){

            $data = $this->find_system_route();
            $this->check_new_route($data);
        }
        else
            {
            $data = $this->find_system_route();
            $this->create_permission_data($data);
        }

        return view('admin.permissions.index')->with('permissions',$permissions);
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('admin.permissions.edit')->with('permission',$permission);
    }
    public function update(Request $request, $id){
        $this->validate($request,array(
            'display_name' => 'string|max:255',
            'description' => 'string|max:255',
       ));

        $permission = Permission::find($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permission.index');
    }

    protected function check_new_route($data){

        foreach ($data as $route){
            if(
                (strpos($route,'index') !== false) or
                (strpos($route,'create') !== false) or
                (strpos($route,'show') !== false) or
                (strpos($route,'edit') !== false) or
                (strpos($route,'destroy') !== false)
            ){

                $permission = Permission::where('name',$route)->first();
                if(isset($permission) == false && count($permission) == false){
                    $temp[] = $route;
//
                }


            }
        }

        if(isset($temp)){
            $this->create_permission_data($temp);
            unset($temp);
        }

    }

    protected function find_system_route(){
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            if($value->getName() != null){
                $data[] = $value->getName();
            }

        }

        return $data;
    }

    protected function create_permission_data($data)
    {
        foreach ($data as $string){
            if(strpos($string,'index') !== false)
            {
                $key = explode(".",$string);
                $permission = new Permission();
                $permission->name = $string;
                $permission->display_name = "show ".$key[0]." table";
                $permission->description = "Admin will be able to see all system ".$key[0];
                $permission->save();

            }
            else if(strpos($string,'create') !== false){
                $key = explode(".",$string);
                $permission = new Permission();
                $permission->name = $string;
                $permission->display_name = "Create new ".$key[0];
                $permission->description = "Admin will be able to Create new ".$key[0];
                $permission->save();
            }
            else if(strpos($string,'show') !== false){
                $key = explode(".",$string);
                $permission = new Permission();
                $permission->name = $string;
                $permission->display_name = "Show Spacific ".$key[0]. " Data";
                $permission->description = "Admin will be able to see spacific ".$key[0]." profile";
                $permission->save();
            }
            else if(strpos($string,'edit') !== false){
                $key = explode(".",$string);
                $permission = new Permission();
                $permission->name = $string;
                $permission->display_name = "Edit ".$key[0]. " Data";
                $permission->description = "Admin will be able to Edit ".$key[0]." Data";
                $permission->save();
            }
            else if(strpos($string,'destroy') !== false){
                $key = explode(".",$string);
                $permission = new Permission();
                $permission->name = $string;
                $permission->display_name = "Delete ".$key[0]. " Data";
                $permission->description = "Admin will be able to Delete ".$key[0]." Data";
                $permission->save();
            }
        }
    }



    // delete the relation between spacific role and permission
    public function delete_relation($role_id,$permission_id)
    {
        $role = Role::find($role_id);
        $role->permissions()->detach($permission_id);
        return redirect()->back();
    }
}
