<?php

Route::get('html-select', ['as' => 'html.select', 'uses' => 'RelationshipController@htmlSelectData']);

Route::group(['prefix' => 'relationships'], function () {

    Route::get('', function () {
        return redirect()->route('one.to.one');
    });

    Route::get('one-to-one',
        ['as' => 'one.to.one', 'uses' => 'RelationshipController@oneToOne']);
    Route::get('one-to-one-del/{id}',
        ['as' => 'one.to.one.delete', 'uses' => 'RelationshipController@oneToOneDelete']);
    Route::post('one-to-one',
        ['as' => 'one.to.one.insert', 'uses' => 'RelationshipController@oneToOneInsert']);

    Route::get('one-to-many',
        ['as' => 'one.to.many', 'uses' => 'RelationshipController@oneToMany']);

    Route::post('one-to-many',
        ['as' => 'one.to.many.post', 'uses' => 'RelationshipController@oneToManyPost']);

    Route::get('many-to-many',
        ['as' => 'many.to.many', 'uses' => 'RelationshipController@manyToMany']);
    Route::post('many-to-many',
        ['as' => 'many.to.many.insert', 'uses' => 'RelationshipController@manyToManyInsert']);

    Route::get('has-many-through',
        ['as' => 'has.many.through', 'uses' => 'RelationshipController@hasManyThrough']);

    Route::get('polymorphic',
        ['as' => 'polymorphic', 'uses' => 'RelationshipController@polymorphic']);
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

Route::get('mongo', function () {
    $collection = DB::connection('mongodb')->collection('l5dbeka');
    // $insert = $collection->insert([
    //     'key' => '123',
    //     'value' => ['1', '2', '3'],
    // ]);
    $doc = $collection->where(['key' => '123'])->get();
    dd($doc);
});