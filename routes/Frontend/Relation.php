<?php
/**
 * Relations
 *
 */
Route::group(['namespace' => '', 'prefix' => '', 'as' => 'relations.', 'middleware' => 'admin'], function () {


//Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function ()
/*
| frontend.relations.relations.store                  | App\Http\Controllers\Frontend\Relations\RelationsController@store
| frontend.relations.relations.index                  | App\Http\Controllers\Frontend\Relations\RelationsController@index
| frontend.relations.relations.create                 | App\Http\Controllers\Frontend\Relations\RelationsController@create
| frontend.relations.api.relations.get                | App\Http\Controllers\Frontend\Relations\RelationsTableController
| frontend.relations.relations.destroy                | App\Http\Controllers\Frontend\Relations\RelationsController@destroy
| frontend.relations.relations.show                   | App\Http\Controllers\Frontend\Relations\RelationsController@show
| frontend.relations.relations.update                 | App\Http\Controllers\Frontend\Relations\RelationsController@update
| frontend.relations.relations.edit                   | App\Http\Controllers\Frontend\Relations\RelationsController@edit **/

    Route::group(['namespace' => 'Relations', 'prefix' => '', 'name' => 'relations.'], function () {
        Route::resource('relations', 'RelationsController');
    });


    //For Datatable
    Route::group(['namespace' => 'Relations', 'prefix' => ''], function () {
        Route::post('relations/get', 'RelationsTableController')->name('api.relations.get');
    });

});


Route::group(['namespace' => 'Relations'], function () {
    Route::get('relations/get-form/{name?}', 'RelationsFormController@create')->name('relations.getform');
});