<?php
// HOME
Route::get('/', function()
        {
            return View::make('api.index');
            });

// API V0
Route::get('v0', function()
        {
            return View::make('v0.index');
            });

Route::any('v0/forum/(:num?)', array('uses' => 'v0.forum@index'));
Route::any('v0/user/(:num?)', array('uses' => 'v0.user@index'));
Route::any('v0/topic/(:num)', array('uses' => 'v0.topic@index'));
Route::any('v0/stats/(:any?)', array('uses' => 'v0.stat@index'));

Event::listen('404', function()
{
    return Response::json( array( 'error' => array( 'message' => 'The requested resource could not be found', 'code' => '404')), '404');
});

Event::listen('500', function()
{
    return Response::json( array( 'error' => array( 'message' => 'Internal Server Error', 'code' => '500')), '500');
});
?>
