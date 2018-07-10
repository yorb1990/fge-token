<?php
use Illuminate\Http\Request;
Route::get('/hub', function () {
    return view("fge_tok-hub::hub");
});