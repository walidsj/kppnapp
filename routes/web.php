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

        #--------------------------------------------------------------------
        # ROUTE USER
        #--------------------------------------------------------------------
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/upcoming-agenda', 'UpcomingAgendaController@index')->name('upcoming_agenda');
        Route::get('/agenda', 'AgendaController@index')->name('agenda');

        Route::get('/agenda/{slug}', 'AgendaController@detail')->name('agenda_detail');


        #--------------------------------------------------------------------
        # ROUTE ADMIN GALAK
        #--------------------------------------------------------------------
        Route::middleware(['auth.admin'])->group(
            function () {
                Route::group(
                    ['prefix' => 'master'],
                    function () {
                        # MASTER DATA POSITION/JABATAN -------------------------------
                        Route::get('/position', 'PositionController@position_index')->name('master_position');

                        Route::get('/position/get', 'PositionController@position_get')->name('master_position.get');
                        Route::post('/position', 'PositionController@position_store')->name('master_position.store');
                        Route::put('/position', 'PositionController@position_update')->name('master_position.update');
                        Route::delete('/position', 'PositionController@position_destroy')->name('master_position.destroy');

                        Route::delete('/position/delete', 'PositionController@position_destroy_permanent')->name('master_position.destroy_permanent');
                        Route::put('/position/restore', 'PositionController@position_restore')->name('master_position.restore');

                        Route::post('/data/position', 'PositionController@datatable_position')->name('datatable_position');
                        Route::post('/data/position/trash', 'PositionController@datatable_trash_position')->name('datatable_trash_position');
                        #-------------------------------- jangan diutik-utik plis ----

                        # MASTER DATA WORKUNIT/SATUAN KERJA #
                        Route::get('/workunit', 'WorkunitController@workunit_index')->name('master_workunit');

                        Route::get('/workunit/get', 'WorkunitController@workunit_get')->name('master_workunit.get');
                        Route::post('/workunit', 'WorkunitController@workunit_store')->name('master_workunit.store');
                        Route::put('/workunit', 'WorkunitController@workunit_update')->name('master_workunit.update');
                        Route::delete('/workunit', 'WorkunitController@workunit_destroy')->name('master_workunit.destroy');

                        Route::delete('/workunit/delete', 'WorkunitController@workunit_destroy_permanent')->name('master_workunit.destroy_permanent');
                        Route::put('/workunit/restore', 'WorkunitController@workunit_restore')->name('master_workunit.restore');

                        Route::post('/data/workunit', 'WorkunitController@datatable_workunit')->name('datatable_workunit');
                        Route::post('/data/workunit/trash', 'WorkunitController@datatable_trash_workunit')->name('datatable_trash_workunit');
                        #-------------------------------- jangan diutik-utik plis ----


                    }
                );
            }
        );
    }
);
