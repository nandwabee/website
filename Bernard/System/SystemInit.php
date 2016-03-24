<?php namespace Bernard\System;

use App\User;
use Bernard\Auth\Storage\Repo\AuthEloquentRepo;

class SystemInit{
    function __construct()
    {
        $this->authrepo = new AuthEloquentRepo;
    }

    public function create_root_user(){
        $root = $this->authrepo->get_root_user();

        if(!$root){
            $user = $this->authrepo->create([
                'email' => env('ADMIN_EMAIL'),
                'name' => env('ADMIN_NAME'),
                'password' => bcrypt(env('ADMIN_PASSWORD')),
                'uid' => 1
            ]);
        }
    }
}