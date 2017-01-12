<?php


Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'PagesController@home');

///// EVENTS /////

Route::group(['prefix' => 'events', 'name' => 'events'], function (){
    //
});


///// VENUES /////

Route::group(['prefix' => 'venues', 'name' => 'venues'], function (){
    //
});


///// PERFORMERS /////

Route::group(['prefix' => 'performers', 'name' => 'performers'], function (){
    //
});


