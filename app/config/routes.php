<?php

use Core\Router;

Router::add('register', '/register', '\App\Controllers\Auth\RegisterController', 'index');
Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index');
Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController', 'index');
Router::add('index', '/', '\App\Controllers\GameController', 'game');
Router::add('play', '/play', '\App\Controllers\GameController',  'play');