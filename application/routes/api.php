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

Route::any('v0/forum/(:num?)', array('uses' => 'v0.forum@index'));
Route::any('v0/user/(:num?)', array('uses' => 'v0.user@index'));
Route::any('v0/login/(:any?)/(:any?)', array('uses' => 'v0.login@index'));
Route::any('v0/topic/(:num)', array('uses' => 'v0.topic@index'));
Route::any('v0/stats/(:any?)', array('uses' => 'v0.stat@index'));
?>
