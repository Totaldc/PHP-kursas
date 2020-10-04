<?php

use Core\Router;

Router::add('register', '/register', '\App\Controllers\Auth\RegisterController', 'index');
Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index');
Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController', 'index');
Router::add('index', '/', '\App\Controllers\PixelsController', 'index');
Router::add('my', '/my', '\App\Controllers\PixelsController', 'my');
Router::add('add', '/add', '\App\Controllers\PixelsController', 'add');
Router::add('index', '/', '\App\Controllers\PixelsController', 'game');
Router::add('play', '/play', '\App\Controllers\PixelsController',  'play');