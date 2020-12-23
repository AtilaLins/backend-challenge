<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\User;
use Illuminate\Http\JsonResponse;


$router->post('user/isPasswordValid', function(\Illuminate\Http\Request $request) {
    $password = $request->input('password');
    return new JsonResponse([User::getIsPasswordValid($password)]);
});

