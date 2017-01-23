<?php


Route::get('/', 'PagesController@welcome');

///// EVENTS /////

Route::group(['prefix' => 'events', 'name' => 'events'], function (){

    Route::get('/{event}', 'EventsController@show');
    Route::get('/', 'EventsController@index');

});


///// VENUES /////

Route::group(['prefix' => 'venues', 'name' => 'venues'], function (){
    //
});


///// PERFORMERS /////

Route::group(['prefix' => 'performers', 'name' => 'performers'], function (){
    //
});


///// API /////

Route::group(['prefix' => 'api', 'name' => 'api'], function (){

    ///// MENU /////

    Route::get('/menu/{tag?}', 'MenuController@eventsAndPerformers');
});


Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


