<?php



Route::get('/', 'TaskController@index');

Route::post('task/create', 'TaskController@store')->name('task.create');


Route::delete('task/delete/{task}','TaskController@destroy')->name('task.destroy');

