<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Abedin\Maker\Repositories\Repository;

class UserRepository extends Repository
{
    public static function model()
    {
        return User::class;
    }
    /**
     * Create a new user
     */
    public static function registerByRequest($request)
    {
        $user = self::create([
            'name' => (string) $request->name,
            'email' => (string) $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $user->sendEmailVerificationNotification();

        return $user;
    }
}
