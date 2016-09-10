<?php

Route::get('/', function () {
    // $users = \App\User::connection('sqlite')->take(20)->get();
    // dd($users->toArray());
    $examples = \App\Example::take(20)->get(['name', 'email', 'birth_date']);
    return view('example.index')->with(['examples' => $examples]);
});
