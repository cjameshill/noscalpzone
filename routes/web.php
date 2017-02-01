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


///// DASHBOARD /////

Route::group(['prefix' => 'dashboard', 'name' => 'dashboard'], function (){

    Route::get('/', 'DashboardController@index');

});


///// SELLING /////

Route::group(['prefix' => 'sell', 'name' => 'sell'], function (){
    Route::get('/{event}', 'SellController@event');
    Route::get('/', 'SellController@index');
});


///// API /////

Route::group(['prefix' => 'api', 'name' => 'api'], function (){

    ///// SELL /////

    Route::group(['prefix' => 'event/{event}/list'], function (){
        Route::post('/reset', 'ListController@reset');
        Route::get('/resume', 'ListController@resume');
        Route::post('/stash', 'ListController@stash');
        Route::post('/upload', 'ListController@upload');
        Route::resource('/', 'ListController');

    });

    ///// USER /////

    Route::group(['prefix' => 'user'], function (){
        Route::get('/{user}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::get('/', 'UserController@index');

        ///// USER - CUSTOMER /////

        Route::group(['prefix' => '/{user}/customer'], function (){
            Route::get('/source', 'CustomerController@source');
            Route::get('/', 'CustomerController@show');
        });

        ///// USER - PAYMENT /////

        Route::group(['prefix' => '/{user}/payments'], function (){
            Route::get('/', 'PaymentsController@show');
        });

    });

    ///// TICKET /////

    Route::group(['prefix' => 'ticket'], function (){
        Route::get('/{ticket}', 'TicketsController@show');
        Route::get('/{ticket}/set', 'TicketsController@set');
        Route::get('/{ticket}/set/download', 'TicketDistributionController@download');
    });


    ///// STRIPE /////

    Route::group(['prefix' => 'stripe'], function (){
        Route::post('/', 'StripeController@handleStripePayment');


        ///// STRIPE WEBHOOKS /////

        Route::group(['prefix' => 'webhooks'], function (){
            Route::post('/', 'WebhooksController@handle');
        });

    });


    ///// MENU /////

    Route::get('/menu/{tag?}', 'MenuController@eventsAndPerformers');
});


Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');


