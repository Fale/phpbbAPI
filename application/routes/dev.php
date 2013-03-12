<?php
// HOME
Route::get('/', function() {
    return View::make('dev.index');
});

// ABOUT
Route::get('about', function() {
    return View::make('dev.about');
});

// CONTACT
Route::get('contact', function() {
    return View::make('dev.contact');
});

// RSS
Route::get('rss', function() {
    return View::make('rss.index');
});

// API
Route::get('api', function() {
    return View::make('dev.api');
});

// API V0
Route::get('api/v0', function() {
    return View::make('api-v0.index');
});

// API V1
Route::get('api/v1', function() {
    return View::make('api-v1.index');
});
?>
