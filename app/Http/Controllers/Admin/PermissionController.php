<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission ;
use Illuminate\Support\Facades\Route;
class PermissionController extends Controller
{
    //
    public function index(){



        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $value) {
            $data[] = $value->getName();
        }

        dd($data);
    }

}
