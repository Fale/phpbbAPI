<?php
// HOME
Route::get('/', function()
        {
            return View::make('home.index');
            });

// API V0
Route::get('v0', function()
        {
            return View::make('v0.index');
            });

Route::any('v0/forum/(:num?)', array('uses' => 'v0_forum@index'));
Route::any('v0/user/', array('uses' => 'v0_user@index'));
Route::any('v0/topic/(:num)', array('uses' => 'v0_topic@index'));
?>
