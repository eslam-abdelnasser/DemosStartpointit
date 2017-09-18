<?php
/**
 * Created by PhpStorm.
 * User: Anemam
 * Date: 8/20/2017
 * Time: 7:21 PM
 */



namespace App;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Admin extends Authenticatable
{
    use Notifiable , EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','job_title'
    ];

    protected $guard = 'admin' ;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class);
//    }


}
