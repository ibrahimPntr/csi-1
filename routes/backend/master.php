<?php

/** Routing Pengelolaan Dosen */
Route::post('/dosen/cari', 'DosenCariController@show')->name('dosencari.show'); //routing pencarian dosen
Route::get('/dosen/cari', 'DosenController@index')->name('dosencari.index'); //routing pencarian dosen
Route::resource('dosen', 'DosenController');

/** Routing Pengelolaan Mahasiswa */
Route::post('/admin/mahasiswa/cari', 'MahasiswaCariController@show')->name('admin.mahasiswacari.show'); //routing pencarian mahasiswa
Route::get('/admin/mahasiswa/cari', 'MahasiswaController@index')->name('admin.mahasiswacari.index'); //routing pencarian mahasiswa
Route::resource('mahasiswa', 'MahasiswaController');

