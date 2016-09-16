<?php

Route::get('/', function () {
    // $users = \App\User::connection('sqlite')->take(20)->get();
    // dd($users->toArray());
    $examples = \App\Example::take(20)->get(['name', 'email', 'birth_date']);
    return view('example.index')->with(['examples' => $examples]);
});

Route::group(['prefix' => 'relationships'], function () {
    Route::get('one-to-one', ['as' => 'one.to.one', 'uses' => 'RelationshipController@oneToOne']);
    Route::get('one-to-many', ['as' => 'one.to.many', 'uses' => 'RelationshipController@oneToMany']);
    Route::post('one-to-many', ['as' => 'add.one.to.many', 'uses' => 'RelationshipController@addOneToMany']);
    Route::get('many-to-many', ['as' => 'many.to.many', 'uses' => 'RelationshipController@manyToMany']);
    Route::post('many-to-many', ['as' => 'add.many.to.many', 'uses' => 'RelationshipController@addManyToMany']);
    Route::get('has-many-through', ['as' => 'has.many.through', 'uses' => 'RelationshipController@hasManyThrough']);
    Route::get('polymorphic', ['as' => 'polymorphic', 'uses' => 'RelationshipController@polymorphic']);
});
