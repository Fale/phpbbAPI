<?php
// HOME
Route::get('/', function() {
    return View::make('dev.index');
});

// API
Route::get('api', function() {
    return View::make('dev.api');
});

// API V0
Route::get('api/v0', function() {
    return View::make('api-v0.index');
});
?>
