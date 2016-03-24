<?php namespace Bernard\Auth\Storage\Repo;

use App\User;

class AuthEloquentRepo{
    /**
     * Get the root user. UID (1)
     */
    public function get_root_user(){
        $user = User::where('uid',1)
            ->first();

        return $user;
    }

    /**
     * Create a new user
     *
     * @param $payload array
     * @return static
     */
    public function create($payload){
        $user = User::create($payload);

        return $user;
    }
}