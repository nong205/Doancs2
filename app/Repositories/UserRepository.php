<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterface
{
    public function getUserById(int $id)
    {
        return User::find($id);
    }


    public function getUserByToken($token)
    {
        return User::where('remember_token', '=', $token)->first();
    }

    public function all()
    {
        return User::all();
    }

    public function getUserByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }

    public function getAllUser()
    {
        return User::all();
    }

    public function getRecordUser()
    {
        return User::where('is_admin' , '=', 0)
            ->where('is_delete' , '=', 0)
            ->orderBy('users.id', 'desc')->get();

    }
}
