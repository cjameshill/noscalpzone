<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

///// EVENTS /////

Route::group(['prefix' => 'events', 'name' => 'events'], function (){
    //
});


///// VENUES /////

Route::group(['prefix' => 'events', 'name' => 'events'], function (){
    //
});


///// PERFORMERS /////

Route::group(['prefix' => 'events', 'name' => 'events'], function (){
    //
});


