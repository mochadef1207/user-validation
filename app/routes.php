<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/register', function()
{
    return View::make('register');
});

Route::post('/register', function()
{
    // 1. setting validasi
    $validator = Validator::make(
        Input::all(),
        array(
            "email"                 => "required|email|unique:users,email",
            "password"              => "required|min:6",
            "password_confirmation" => "same:password",
        )
    );

    // 2a. Jika semua validasi terpenuhi simpan ke database
    if($validator->passes())
    {
        $user = new User;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        return Redirect::to("register")->with('register_success','Selamat, Anda telah melakukan registrasi online :P');
    }

    // 2b. Jika tidak, kembali ke halaman form register
    else
    {
        return Redirect::to('register')
            ->withErrors($validator)
            ->withInput();
    }
});