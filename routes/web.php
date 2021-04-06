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
        Route::get('/contact-us', 'InfoController@user_contact_index')->name('contact');


        #--------------------------------------------------------------------
        # ROUTE ADMIN GALAK
        #--------------------------------------------------------------------
        Route::middleware(['auth.admin'])->group(
            function () {
                Route::get('/application-info', 'InfoController@index')->name('application_info');

                #---- route list moderator & admin
                Route::get('/moderator-list', 'ModeratorAdminController@index')->name('moderator_list');
                Route::put('/moderator-list', 'ModeratorAdminController@update')->name('moderator_list.update');

                Route::get('/admin-list', 'ModeratorAdminController@admin_index')->name('admin_list');
                Route::put('/admin-list', 'ModeratorAdminController@admin_update')->name('admin_list.update');

                Route::post('/data/moderator-list', 'ModeratorAdminController@datatable_moderator')->name('moderator_list.datatable');
                Route::post('/data/user-list', 'ModeratorAdminController@datatable_user')->name('user_list.datatable');
                Route::post('/data/admin-list', 'ModeratorAdminController@datatable_admin')->name('admin_list.datatable');
                #---- route list moderator & admin

                #---- route master
                Route::group(
                    ['prefix' => 'master'],
                    function () {
                        # MASTER DATA POSITION/JABATAN -------------------------------
                        Route::get('/position', 'PositionController@index')->name('master_position');

                        Route::get('/position/get', 'PositionController@get')->name('master_position.get');
                        Route::post('/position', 'PositionController@store')->name('master_position.store');
                        Route::put('/position', 'PositionController@update')->name('master_position.update');
                        Route::delete('/position', 'PositionController@destroy')->name('master_position.destroy');

                        Route::delete('/position/delete', 'PositionController@destroy_permanent')->name('master_position.destroy_permanent');
                        Route::put('/position/restore', 'PositionController@restore')->name('master_position.restore');

                        Route::post('/data/position', 'PositionController@datatable')->name('datatable_position');
                        Route::post('/data/position/trash', 'PositionController@datatable_trash')->name('datatable_trash_position');
                        #-------------------------------- jangan diutik-utik plis ----

                        # MASTER DATA WORKUNIT/SATUAN KERJA --------------------------
                        Route::get('/workunit', 'WorkunitController@index')->name('master_workunit');

                        Route::get('/workunit/get', 'WorkunitController@get')->name('master_workunit.get');
                        Route::post('/workunit', 'WorkunitController@store')->name('master_workunit.store');
                        Route::put('/workunit', 'WorkunitController@update')->name('master_workunit.update');
                        Route::delete('/workunit', 'WorkunitController@destroy')->name('master_workunit.destroy');

                        Route::delete('/workunit/delete', 'WorkunitController@destroy_permanent')->name('master_workunit.destroy_permanent');
                        Route::put('/workunit/restore', 'WorkunitController@restore')->name('master_workunit.restore');

                        Route::post('/data/workunit', 'WorkunitController@datatable')->name('datatable_workunit');
                        Route::post('/data/workunit/trash', 'WorkunitController@datatable_trash')->name('datatable_trash_workunit');
                        #-------------------------------- jangan diutik-utik plis ----

                        # MASTER DATA STATUS KEGIATAN --------------------------------
                        Route::get('/status-agenda', 'StatusAgendaController@index')->name('master_status_agenda');

                        Route::get('/status-agenda/get', 'StatusAgendaController@get')->name('master_status_agenda.get');
                        Route::post('/status-agenda', 'StatusAgendaController@store')->name('master_status_agenda.store');
                        Route::put('/status-agenda', 'StatusAgendaController@update')->name('master_status_agenda.update');
                        Route::delete('/status-agenda', 'StatusAgendaController@destroy')->name('master_status_agenda.destroy');

                        Route::delete('/status-agenda/delete', 'StatusAgendaController@destroy_permanent')->name('master_status_agenda.destroy_permanent');
                        Route::put('/status-agenda/restore', 'StatusAgendaController@restore')->name('master_status_agenda.restore');

                        Route::post('/data/status-agenda', 'StatusAgendaController@datatable')->name('datatable_status_agenda');
                        Route::post('/data/status-agenda/trash', 'StatusAgendaController@datatable_trash')->name('datatable_trash_status_agenda');
                        #-------------------------------- jangan diutik-utik plis ----

                        # MASTER DATA STATUS KEGIATAN --------------------------------
                        Route::get('/contact', 'InfoController@contact_index')->name('master_contact');

                        Route::get('/contact/get', 'InfoController@contact_get')->name('master_contact.get');
                        Route::post('/contact', 'InfoController@contact_store')->name('master_contact.store');
                        Route::put('/contact', 'InfoController@contact_update')->name('master_contact.update');
                        Route::delete('/contact', 'InfoController@contact_destroy')->name('master_contact.destroy');

                        Route::delete('/contact/delete', 'InfoController@contact_destroy_permanent')->name('master_contact.destroy_permanent');
                        Route::put('/contact/restore', 'InfoController@contact_restore')->name('master_contact.restore');

                        Route::post('/data/contact', 'InfoController@contact_datatable')->name('datatable_contact');
                        Route::post('/data/contact/trash', 'InfoController@contact_datatable_trash')->name('datatable_trash_contact');
                        #-------------------------------- jangan diutik-utik plis ----
                    }
                );
                #---- route master
            }
        );
    }
);
