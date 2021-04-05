<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(
    function () {

        # ROUTE USER
        # Bismillah ----------------------------------------------------------
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/upcoming-agenda', 'UpcomingAgendaController@index')->name('upcoming_agenda');
        Route::get('/agenda', 'AgendaController@index')->name('agenda');

        Route::get('/agenda/{slug}', 'AgendaController@detail')->name('agenda_detail');


        # ROUTE ADMIN GALAK
        # Bismillah ----------------------------------------------------------
        Route::middleware(['auth.admin'])->group(
            function () {
                Route::group(
                    ['prefix' => 'master'],
                    function () {
                        # MASTER DATA POSITION/JABATAN #
                        Route::get('/position', 'PositionController@position_index')->name('master_position');

                        Route::get('/position/get', 'PositionController@position_get')->name('master_position.get');
                        Route::post('/position', 'PositionController@position_store')->name('master_position.store');
                        Route::put('/position', 'PositionController@position_update')->name('master_position.update');
                        Route::delete('/position', 'PositionController@position_destroy')->name('master_position.destroy');

                        Route::delete('/position/delete', 'PositionController@position_destroy_permanent')->name('master_position.destroy_permanent');
                        Route::put('/position/restore', 'PositionController@position_restore')->name('master_position.restore');

                        # MASTER DATA WORKUNIT/SATUAN KERJA #
                        Route::get('/workunit', 'MasterController@workunit_index')->name('master_workunit');

                        # INIT DATATABLE #
                        Route::post('/data/position', 'PositionController@datatable_position')->name('datatable_position');
                        Route::post('/data/position/trash', 'PositionController@datatable_trash_position')->name('datatable_trash_position');

                        Route::post('/data/workunit', 'MasterController@datatable_workunit')->name('datatable_workunit');
                    }
                );
            }
        );
    }
);
