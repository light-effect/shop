<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function signIn()
    {
        return view('login');
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

    public function postSignIn(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ($user !== null && Hash::check($request->input('password'), $user->password) === true) {
            Auth::login($user);

            return redirect('/');
        }

        return redirect('/sign-in');
    }

    public function logout()
    {
        Auth::logout();

       return  redirect('/sign-in');
    }

    public function category(int $id = null)
    {
        if ($id === null) {
            return view('all');
        }

        $category = Category::find($id);

        return view('category', ['category' => $category]);
    }

    public function curl()
    {
        try {
            $user = User::findByEmail('light-effect@outlook.com');
        } catch (\Exception $exception) {
            echo '<pre>';
            var_dump($exception->getMessage());
            exit;
        }

        //var_dump($user); exit;


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);

        $result = curl_exec($curl);

        $exchange = json_decode($result);

        echo '<pre>';
        var_dump($exchange);

        ini_set('max_execution_time', 60);


        curl_close($curl);
    }
}
