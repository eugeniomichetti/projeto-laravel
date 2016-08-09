<?php
/**
 * Created by PhpStorm.
 * User: Michetti
 * Date: 06/08/2016
 * Time: 16:38
 */

namespace ProjetoLaravel\OAuth;


use Illuminate\Support\Facades\Auth;

class Verifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email' => $username,
            'password' => $password
        ];
        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }
        return false;
    }
}