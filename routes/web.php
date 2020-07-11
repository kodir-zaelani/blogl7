<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('lte');
// });

//frontend
Route::group(['layout' => 'layouts.frontend'], function () {
    Route::livewire('/', 'frontend.home.index')->name('root');
    Route::livewire('/all', 'frontend.post.all')->name('post.all');
    Route::livewire('/search', 'frontend.post.search')->name('post.search');
    Route::livewire('/show/{post}', 'frontend.post.show')->name('post.show');
    Route::livewire('/category/{slug}', 'frontend.category.show')->name('category.show');
    Route::livewire('/author/{slug}', 'frontend.author.show')->name('author.show');
    Route::livewire('/tag/{slug}', 'frontend.tag.show')->name('tag.show');
    Route::livewire('/about', 'frontend.about.index')->name('about.index');
});

//home backend
Route::prefix('backend')->group(function () {
    Route::group(['layout' => 'layouts.backend'], function() {
        Route::livewire('/dashboard', 'backend.admin.dashboard.index')->name('dashboard.index');
        Route::livewire('/categories', 'backend.admin.categories.index')->name('categories.index');
        Route::livewire('/categories/create', 'backend.admin.categories.create')->name('categories.create');
        Route::livewire('/categories/edit/{id}', 'backend.admin.categories.edit')->name('categories.edit');
        Route::livewire('/categories/destroy/{id}', 'backend.admin.categories.destroy')->name('categories.destroy');
        Route::livewire('/tags', 'backend.admin.tags.index')->name('tags.index');
        Route::livewire('/tags/create', 'backend.admin.tags.create')->name('tags.create');
        Route::livewire('/tags/edit/{id}', 'backend.admin.tags.edit')->name('tags.edit');
        Route::livewire('/tags/destroy/{id}', 'backend.admin.tags.destroy')->name('tags.destroy');
        Route::livewire('/posts', 'backend.admin.posts.index')->name('posts.index');
        Route::livewire('/posts/create', 'backend.admin.posts.create')->name('posts.create');
        Route::livewire('/posts/edit/{id}', 'backend.admin.posts.edit')->name('posts.edit');
        Route::livewire('/posts/destroy/{id}', 'backend.admin.posts.destroy')->name('posts.destroy');
    });
});


