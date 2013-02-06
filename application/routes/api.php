<?php
Route::any('v0/forum/(:num?)', array('uses' => 'v0.forum@index'));
Route::any('v0/user/(:num?)', array('uses' => 'v0.user@index'));
Route::any('v0/topic/(:num)', array('uses' => 'v0.topic@index'));
Route::any('v0/stats/(:any?)', array('uses' => 'v0.stat@index'));

Route::post('v1/account/login', array('uses' => 'v1.account@login'));
Route::any('v1/account/', array('before' => 'auth', 'uses' => 'v1.account@index'));

Route::filter('auth', function()
{
    $creds = array(
        'username' => Request::getUser(),
        'password' => Request::getPassword(),
    );
    if (!Auth::attempt($creds))
        return Response::json( array( 'error' => array( 'message' => 'Unauthorized', 'code' => '401')), '401');
});

Event::listen('404', function()
{
    return Response::json( array( 'error' => array( 'message' => 'The requested resource could not be found', 'code' => '404')), '404');
});

Event::listen('500', function()
{
    return Response::json( array( 'error' => array( 'message' => 'Internal Server Error', 'code' => '500')), '500');
});
?>
