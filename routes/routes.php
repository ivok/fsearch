<?php

App::bind('fsearch', function () {
    return new \Fsearch\Fsearch();
});

Route::group(['namespace' => 'Fsearch\Http'], function () {
    Route::get('/fs', function () {
        return view('fsearch::fs');
    })->name('fs.home');

    Route::post('/fs/search', function (\Illuminate\Http\Request $request) {
        try {
            $result = Fsearch::search($request->get('content'), $request->get('path'));
            return view('fsearch::result', compact('result'));
        } catch (\Exception $e) {
            return view('fsearch::notfound');
        }
    })->name('fs.search');
});
