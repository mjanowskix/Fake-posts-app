<?php

$app->route(['GET'], '/', App\Controllers\HomeController::class)->setName('home');
$app->route(['GET'], '/synchronize', App\Controllers\SyncController::class)->setName('synchronize');

$app->route(['GET'], '/users', App\Controllers\UsersController::class)->setName('users.list');
$app->route(['GET'], '/users/single/{id}', App\Controllers\UsersController::class, 'single')->setName('users.single');

$app->route(['GET'], '/posts', App\Controllers\PostsController::class)->setName('posts.list');
$app->route(['GET'], '/posts/single/{id}', App\Controllers\PostsController::class, 'single')->setName('posts.single');
