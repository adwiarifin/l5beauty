<?php

// Blog pages
get('/', function () {
    return redirect('/blog');
});
get('blog', 'BlogController@index');
get('blog/{slug}', 'BlogCOntroller@showPost');

// Admin area
get('admin', function() {
    return redirect('/admin/post');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function() {
    resource('admin/post', 'PostController');
    resource('admin/tag', 'TagController');
    get('admin/upload', 'UploadController@index');
});

// Logging in and out
get('/login', 'Auth\AuthController@getLogin');
post('/login', 'Auth\AuthController@postLogin');
get('logout', 'Auth\AuthController@getLogout');