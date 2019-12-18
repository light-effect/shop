<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;

class IndexController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function signUp()
    {
        return view('sign');
    }

    public function postSignUp(Request $request)
    {
        if ($request->input('password') !== $request->input('repeat_password')) {
            echo 'Passwords is not same';

            return view('sign');
        }

        $user = new User($request->input());

        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('/');
    }
}
