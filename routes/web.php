<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Content;

Route::get('/', function (\Illuminate\Http\Request $r) {
    $q = $r->string('q')->toString();
    $contents = \App\Models\Content::where('published', true)
        ->when($q, fn($w)=> $w->where('title','like',"%$q%")->orWhere('body','like',"%$q%"))
        ->latest()->paginate(10)->withQueryString();
    return view('public.index', compact('contents','q'));
})->name('home');

Route::get('/content/{content}', function (Content $content) {
    abort_unless($content->published, 404);
    return view('public.show', compact('content'));
})->name('public.show');

Route::get('/dashboard', function () {
    $u = auth()->user();
    return $u?->role === 'superadmin'
        ? redirect()->route('superadmin.admins.index')
        : redirect()->route('admin.contents.index');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth','role:admin,superadmin'])
    ->prefix('admin')->name('admin.')->group(function () {
        Route::resource('contents', \App\Http\Controllers\Admin\ContentController::class)->except(['show']);
    });

Route::middleware(['auth','role:superadmin'])
    ->prefix('superadmin')->name('superadmin.')->group(function () {
        Route::resource('admins', \App\Http\Controllers\Superadmin\AdminUserController::class)
              ->parameters(['admins'=>'admin'])
              ->except(['show']);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return redirect()->route('dashboard');
    })->name('profile.edit');

    Route::patch('/profile', function () {
        abort(501);
    })->name('profile.update');

    Route::delete('/profile', function () {
        abort(501); 
    })->name('profile.destroy');
});
Route::redirect('/register', '/login')->name('register');

require __DIR__.'/auth.php';
