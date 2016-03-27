<?php

namespace App;

use Auth;
use Bernard\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','uid'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['is_admin'];

    /**
     * Check if the currently signed in user is an admin.
     *
     * @return bool
     */
    protected function getIsAdminAttribute(){
        if(Auth::check()){
            $user = auth()->user();

            if($user->email == env('ADMIN_EMAIL')){
                return true;
            }

            return false;
        }
    }
}
