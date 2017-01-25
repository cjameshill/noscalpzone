<?php


Route::get('/', 'PagesController@home');

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


///// SELLING /////

Route::group(['prefix' => 'sell', 'name' => 'sell'], function (){
    Route::get('/{event}/resume', 'SellController@resume');
    Route::post('/{event}/save', 'SellController@save');
    Route::post('/{event}/upload', 'SellController@upload');
    Route::get('/{event}', 'SellController@event');
    Route::get('/', 'SellController@index');
});


///// API /////

Route::group(['prefix' => 'api', 'name' => 'api'], function (){

    ///// MENU /////

    Route::get('/menu/{tag?}', 'MenuController@eventsAndPerformers');
});


Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


