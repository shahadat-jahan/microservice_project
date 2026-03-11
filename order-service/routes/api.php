<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->middleware('auth:api')->group(function () {
    Route::get('/my-orders', static function (Request $request) {
        $token = $request->bearerToken();
        $authResponse = Http::withToken($token)
                            ->get('http://api_gateway/api/auth/me');

        $userProfile = $authResponse->json();
        return response()->json([
            'message' => 'Welcome to Order service',
            'user_info' => $userProfile,
            'orders' => [
                ['id' => 101, 'item' => 'Laptop', 'price' => 1200],
                ['id' => 102, 'item' => 'Mouse', 'price' => 25],
            ]
        ]);
    });
});
