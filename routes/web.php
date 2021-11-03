<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\DepartementController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeOfTheMonthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get("user-dashboard",[HomeController::class,"index"])->name('user.index')->middleware('auth');

Route::get('/admin/logout',[AdminController::class,'logout'])->name("admin.logout");

// User routes management
Route::prefix('users')->middleware('isAdmin','auth')->group(function(){

    Route::get('/view',[UserController::class,'view'])->name('user.view');
    Route::get('/add',[UserController::class,'add'])->name('user.add');
    Route::post('/store',[UserController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('/update/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/delete/{id}',[UserController::class,'delete'])->name('user.delete');
});

// Profile management

Route::prefix('profile')->middleware('auth')->group(function(){
    Route::get('/view',[ProfileController::class,'view'])->name('profile.view');
    Route::get('/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::post('/store',[ProfileController::class,'store'])->name('profile.store');
    Route::get('/password/view',[ProfileController::class,'viewPassword'])->name('password.edit');
    Route::post('/password/update',[ProfileController::class,'updatePassword'])->name('password.update');
});

//Departement

Route::prefix("departement")->middleware('isAdmin','auth')->group(function(){
    
    Route::get('/view',[DepartementController::class,'view'])->name('departement.view');
    Route::get('/add',[DepartementController::class,'add'])->name('departement.add');
    Route::post('/store',[DepartementController::class,'store'])->name('departement.store');
    Route::get('/edit/{id}',[DepartementController::class,'edit'])->name('departement.edit');
    Route::post('/update/{id}',[DepartementController::class,'update'])->name('departement.update');
    Route::get('/delete/{id}',[DepartementController::class,'delete'])->name('departement.delete');
});

// Manage employee
Route::prefix("employee")->middleware('isAdmin','auth')->group(function(){
    
    Route::get('/view',[EmployeeController::class,'view'])->name('employee.view');
    Route::get('/add',[EmployeeController::class,'add'])->name('employee.add');
    Route::post('/store',[EmployeeController::class,'store'])->name('employee.store');
    Route::get('/edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
    Route::post('/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
    Route::get('/delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');
});

Route::prefix("task")->middleware('auth')->group(function(){
    Route::get('/add',[TaskController::class,'add'])->name('task.add')->middleware('isAdmin');
    Route::post('/store',[TaskController::class,'sendNotification'])->name('task.store')->middleware('isAdmin');
    Route::get('/delete',[TaskController::class,'clearNotifications'])->name('task.delete');
    Route::get('/view',[TaskController::class,'showNotifications'])->name('task.view');
    Route::get('/read/{notification}',[TaskController::class,'readNotification'])->name('task.read');
});


// Chat 
Route::prefix('chat')->middleware('auth')->group(function(){
    Route::get('room',[ChatController::class,'home'])->name('chat.home');
    Route::post('/store',[ChatController::class,'store'])->name('chat.store');
});

// Employee of the month Management

Route::prefix('employee-of-the-monthy')->middleware("isAdmin","auth")->group(function(){

    Route::get('add',[EmployeeOfTheMonthController::class,'add'])->name('employeeOfTheMonth.add');
    Route::post('store',[EmployeeOfTheMonthController::class,'store'])->name('employeeOfTheMonth.store');
});
