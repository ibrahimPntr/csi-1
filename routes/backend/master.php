<?php

/** Routing Pengelolaan Dosen */
Route::resource('lecturers', 'LecturerController');
Route::resource('students', 'StudentController');
Route::resource('staff', 'StaffController');

/** User Family Management */
//Route::get('user-family/{user}', 'FamilyMemberController@index')->name('user-family.index');
Route::resource('user-family', 'FamilyMemberController')->except(['index']);

/** User Education Managemeng */
//Route::get('user-education/{user}', 'UserEducationController@index')->name('user-education.index');
Route::resource('user-education', 'UserEducationController')->except(['index']);
