<?php

Auth::routes();
Route::get('/','alumnoController@index');

Route::resource('alumnos', 'AlumnoController');
Route::get('alumnos/{id}/confirm','AlumnoController@confirm')->name('alumnos.confirm');
Route::resource('maestros', 'MaestroController');
Route::get('maestros/{id}/confirm','MaestroController@confirm')->name('maestros.confirm');