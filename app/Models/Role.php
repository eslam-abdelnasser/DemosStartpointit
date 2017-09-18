<?php


namespace App\Models;

use App\Admin;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
//    public function admins()
//    {
//        return $this->belongsToMany(Admin::class);
//    }
}