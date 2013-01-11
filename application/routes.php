<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// Mobile Home
Route::get('mobile', function()
{
	return View::make('mobile.index');
});

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

Route::any('v0/forum/(:num?)', array('uses' => 'forum@index'));
/*
Route::get('v0/forum/(:num)', function($id)
{
    return Response::eloquent(
        Topic::query()
            ->where('forum_id','=', $id)
            ->where('topic_approved','=','1')
            ->order_by('topic_last_post_time', 'desc')
            ->get(
                array(
                    'topic_id as id',
                    'topic_attachment as attachment',
                    'topic_title as title',
                    'topic_views as views',
                    'topic_replies as topic_replies',
                    'topic_first_poster_name as first_poster',
                    'topic_poster as first_poster_id',
                    'topic_time as first_post_time',
                    'topic_last_poster_name as last_poster',
                    'topic_last_poster_id as last_poster_id',
                    'topic_last_post_time as last_post_time'
                )
            )
    );
});
*/
Route::get('v0/user', function()
{
    return Response::eloquent(
        User::query()
            ->where('user_password','!=','')
            ->order_by('user_id')
            ->get(
                array(
                    'user_id as id',
                    'user_regdate as regdate',
                    'username as name',
                    'user_posts as posts',
                    'user_lastvisit as last_visit',
                    'user_lastpost_time as last_post'
                )
            )
    );
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});
