<?php

Route::group(['prefix' => 'relationships'], function () {
    Route::get('', function () {
        return redirect()->route('one.to.one');
    });

    Route::get('one-to-one',
        ['as' => 'one.to.one', 'uses' => 'RelationshipController@oneToOne']);

    Route::get('one-to-many',
        ['as' => 'one.to.many', 'uses' => 'RelationshipController@oneToMany']);

    Route::post('one-to-many',
        ['as' => 'one.to.many.post', 'uses' => 'RelationshipController@oneToManyPost']);

    Route::get('many-to-many',
        ['as' => 'many.to.many', 'uses' => 'RelationshipController@manyToMany']);
});










Route::get('/', function () {
    return redirect()->route('one.to.one');
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