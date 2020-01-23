<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'posts' => \App\Post::orderBy('created_at', 'desc')->paginate(1)
    ]);
});

Route::post('/add-post', function (\Illuminate\Http\Request $request) {
    \App\Post::create([
        'title' => $request->input('title', 'Заголовок'),
        'text' => $request->input('text', 'Текст')
    ]);

    return redirect()->back();
})->name('add-post');

Route::delete('/delete-post/{id}', function (int $id) {
    \App\Post::find($id)->delete();

    return redirect()->back();
})->name('delete-post');

Route::get('/question')->name('question');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
