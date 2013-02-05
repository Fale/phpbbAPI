<?php
// HOME
Route::get('/', function() {
    return View::make('api.index');
});

// API V0
Route::get('v0', function() {
    return View::make('v0.index');
});
?>
