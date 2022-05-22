<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return redirect()->route('announcements.index');
});

Route::resource('announcements', AnnouncementController::class, [
    'only' => ['index', 'show'],
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'announcements'], function () {
        Route::get('/', 'AnnouncementController@index')->name('admin.announcements.index');
        Route::get('/create', 'AnnouncementController@create')->name('admin.announcements.create');
        Route::post('/', 'AnnouncementController@store')->name('admin.announcements.store');
        Route::delete('/{announcement}', 'AnnouncementController@destroy')->name('admin.announcements.destroy');
    });
});
