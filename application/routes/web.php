<?php

use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {

    // $databaseName = \DB::table('news')->get();
    // dd($databaseName);


    return response()->json([
            'success' => true,  
            'data' =>  'Hello world'
        ], 200);
});
