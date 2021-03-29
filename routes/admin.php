<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('home');

//Genero ruta de tipo resource para los Roles (7 rutas necesarias para 1 CRUD)

Route::resource('roles', RoleController::class)->names('roles');



//Genero ruta de tipo resource para los Users (7 rutas necesarias para 1 CRUD)

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');