<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/file', function() {
    $file = [
        'filename' => 'test.jpg',
        'desc' => 'A simple jpg',
        'user' => 'jpeavler',
        's3url' => 'null'
    ];
    return $file;
});
