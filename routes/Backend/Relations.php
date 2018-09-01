<?php
/**
 * Relations
 *
 */
Route::group(['namespace' => '', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

    Route::group(['namespace' => 'Relation'], function () {
        Route::resource('relations', 'RelationsController');
        //For Datatable
        Route::post('relations/get', 'RelationsTableController')->name('relations.get');
    });

});