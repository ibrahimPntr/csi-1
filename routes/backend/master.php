<?php

/** Routing Pengelolaan Dosen */
Route::resource('lecturers', 'LecturerController');
Route::resource('students', 'StudentController');
Route::resource('staffs', 'StaffController');

/** Routing Pengelolaan Penelitian */
Route::resource('researches','ResearchController');

Route::resource('research_members', 'ResearchMemberController')->except(['create','show']);
Route::get('researches/{research}/member','ResearchMemberController@show')->name('research_members.show');
Route::get('researches/{research}/member/create','ResearchMemberController@create')->name('research_members.create');

Route::resource('community_services','CommunityServiceController');
Route::resource('community_service_members', 'CommunityServiceMemberController')->except(['create','show']);
Route::get('community_services/{community_service}/member','CommunityServiceMemberController@show')->name('community_service_members.show');
Route::get('community_services/{community_service}/member/create','CommunityServiceMemberController@create')->name('community_service_members.create');

Route::get('report/researches','ResearchController@report')->name('researches.report');
Route::get('report/community_services','CommunityServiceController@report')->name('community_services.report');

Route::get('list','ResearchController@list')->name('list');
Route::get('cetak_pdf/researches', 'ResearchController@cetak_pdf')->name('cetak_penelitian');
Route::get('cetak_pdf/community_services', 'CommunityServiceController@cetak_pdf')->name('cetak_pengabdian');

/** User Family Management */
//Route::get('user-family/{user}', 'FamilyMemberController@index')->name('user-family.index');
Route::resource('user-family', 'FamilyMemberController')->except(['index']);

/** User Education Managemeng */
//Route::get('user-education/{user}', 'UserEducationController@index')->name('user-education.index');
Route::resource('user-education', 'UserEducationController')->except(['index']);
