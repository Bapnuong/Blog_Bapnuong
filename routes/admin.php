<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get(
        '/admin',
        [AdminController::class, 'index']
    )->name('admin.index');


    Route::delete(
    '/admin/users/{id}',
    [AdminController::class, 'destroyUser']
    );

});
