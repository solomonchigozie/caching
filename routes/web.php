<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function(){
    $insert = User::insert([
        [
            'name'=>'john doe',
            'email'=>'john@test.com',
            'password'=>'12345678'
        ],
        [
            'name'=>'mary doe',
            'email'=>'mary@test.com',
            'password'=>'12345678'
        ],
        [
            'name'=>'king doe',
            'email'=>'king@test.com',
            'password'=>'12345678'
        ],
    ]);

    dd($insert);
});

Route::get('cache', function() {
    // Cache::put('post', 'this is a test post cache', $seconds = 5);
    // $value = Cache::get('post');
    // dd($value); 

    // $users = User::all();

    // $users = Cache::rememberForever('users', function () {
    //     return User::all();
    // });

    $users = Cache::pull('users');
    return view('cache', compact('users'));
});