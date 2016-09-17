<?php

Route::get('/', function () {
    // $users = \App\User::connection('sqlite')->take(20)->get();
    // dd($users->toArray());

    // Cache::flush();

    // $has = Cache::has('ved');
    // Cache::forget('ved');
    // if (!$has) {
    // }
    // dd(Cache::get('ved'));

    // $examples = App\Example::take(20)->get(['name', 'email', 'birth_date']);

    // return view('example.index')->with(['examples' => $examples->toArray()]);
});


Route::group(['prefix' => 'relationships'], function () {
    Route::get('', function () {
        return redirect()->route('one.to.one');
    });
    Route::get('one-to-one', ['as' => 'one.to.one', 'uses' => 'RelationshipController@oneToOne']);
    Route::get('one-to-many', ['as' => 'one.to.many', 'uses' => 'RelationshipController@oneToMany']);
    Route::get('many-to-many', ['as' => 'many.to.many', 'uses' => 'RelationshipController@manyToMany']);
});
