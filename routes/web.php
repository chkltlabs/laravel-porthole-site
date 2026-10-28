<?php

use Illuminate\Support\Facades\Route;

/*
| Marketing site routes.
| Docs can grow under /docs later without reshaping the marketing page.
*/

Route::view('/', 'pages.home')->name('home');
