<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    if ($request->user()->tokencan('read')  && $request->user()->tokencan('create')){
        return $request->user();
    }else{
        return abort(403,'dastresi nadari');
    }
    
})->middleware('auth:sanctum');
