<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Tag;

Route::get('/', function () {
    return view('welcome', [
        'tags' => App\Models\Tag::get()
    ]);

});

Route::post('tags', [App\Http\Controllers\TagController::class, 'store']);
Route::put('tags/{tag:slug}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::delete('tags/{tag}', [App\Http\Controllers\TagController::class, 'destroy']);

Route::get('tag/{tag:slug}', function(Tag $tag)
    {
        return view('tag', ['tag' => $tag]);
    
    // return 'Hello World';
    });

//Route::get('tag/{tag:slug}', 'tag')->name('tag');