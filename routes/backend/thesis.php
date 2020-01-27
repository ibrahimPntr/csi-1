<?php
/** Routing Modul Administrasi Tugas Akhir */
Route::resource('theses', 'ThesisController');
Route::delete('thesis-supervisors/{thesis_id}/{lecturer_id}','ThesisSupervisorController@destroy')
    ->name('thesis-supervisors.destroy');
Route::post('thesis-supervisors/{thesis_id}/{lecturer_id}','ThesisSupervisorController@store')
    ->name('thesis-supervisors.store');
