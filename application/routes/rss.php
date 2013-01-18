<?php
Route::any('/user/(:num)/(:num?)', array('uses' => 'rss.user@index'));
Route::any('/forum/(:num)/(:num?)', array('uses' => 'rss.forum@index'));
Route::any('/topic/(:num)/(:num?)', array('uses' => 'rss.topic@index'));
?>
