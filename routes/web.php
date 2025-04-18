<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

//login
Route::get("login", [AuthManager::class, "login"])->name("login");

Route::get("logout", [AuthManager::class, "logout"])->name("logout");

Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");

//register
Route::get("register", [AuthManager::class, "register"])->name("register");

Route::post("register", [AuthManager::class, "registerPost"])->name("register.post");



Route::middleware("auth")->group(function () {

    //we use home page to display all the tasks added to db
    Route::get('/', [TaskManager::class, "listTask"])->name('home');

    //when you click add button u ll be taken to this route
    Route::get("tasks/add", [TaskManager::class, "addTask"])->name("tasks.add");

    Route::post("tasks/add", [TaskManager::class, "addTaskPost"])->name("tasks.add.post");

    Route::get("tasks/status/{id}", [TaskManager::class, "updateTaskStatus"])->name("tasks.status.update");

    Route::get("tasks/delete/{id}", [TaskManager::class, "deleteTask"])->name("tasks.delete");

});
