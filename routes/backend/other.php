<?php

/** Routing Pengelolaan Dosen */
Route::resource('lecturers', 'LecturerController');
Route::resource('students', 'StudentController');
Route::resource('staff', 'StaffController');

/** Routing Pengelolaan Penelitian */
Route::resource('researches','ResearchController');

Route::resource('research_members', 'ResearchMemberController')->except(['create','show']);
Route::get('researches/{research}/member','ResearchMemberController@show')->name('research_members.show');
Route::get('researches/{research}/member/create','ResearchMemberController@create')->name('research_members.create');

Route::resource('community_services','CommunityServiceController');
Route::resource('community_service_members', 'CommunityServiceMemberController')->except(['create','show']);
Route::get('community_services/{community_service}/member','CommunityServiceMemberController@show')->name('community_service_members.show');
Route::get('community_services/{community_service}/member/create','CommunityServiceMemberController@create')->name('community_service_members.create');
/** User Family Management */
//Route::get('user-family/{user}', 'FamilyMemberController@index')->name('user-family.index');
Route::resource('user-family', 'FamilyMemberController')->except(['index']);

/** User Education Managemeng */
//Route::get('user-education/{user}', 'UserEducationController@index')->name('user-education.index');
Route::resource('user-education', 'UserEducationController')->except(['index']);
