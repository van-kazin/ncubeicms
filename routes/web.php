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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Also Restrict to AdminOnly
// User Routes
Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('user/create', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store'])->name('store-user');
Route::get('user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user');
Route::put('user/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update-user');
Route::delete('user/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-user');

// Also Restrict to AdminOnly
// Roles Routes
Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');
Route::get('role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('create-role');
Route::post('role/store', [App\Http\Controllers\RoleController::class, 'store'])->name('store-role');
Route::get('role/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('edit-role');
Route::put('role/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('update-role');
Route::delete('role/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('delete-role');

// Restrict to AdminOnly
// Church Profile Routes
Route::get('church-profile-settings', [App\Http\Controllers\ChurchSettingController::class, 'index'])->name('church-profile');
Route::put('church-profile/update', [App\Http\Controllers\ChurchSettingController::class, 'update'])->name('update-church-profile');


// Restrict to AuthUsers Only
// User-Profile Routes
Route::get('user/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user-profile');
Route::put('user/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('user-profile-update');

// Department Routes
Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments');
Route::get('department/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('create-department');
Route::post('department/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('store-department');
Route::get('department/{department}/edit', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('edit-department');
Route::put('department/{department}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('update-department');
Route::delete('department/{department}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('delete-department');

// Association RouteServiceProvider
Route::get('associations', [App\Http\Controllers\AssociationController::class, 'index'])->name('associations');
Route::get('association/create', [App\Http\Controllers\AssociationController::class, 'create'])->name('create-association');
Route::post('association/store', [App\Http\Controllers\AssociationController::class, 'store'])->name('store-association');
Route::get('association/{association}/edit', [App\Http\Controllers\AssociationController::class, 'edit'])->name('edit-association');
Route::put('association/{association}', [App\Http\Controllers\AssociationController::class, 'update'])->name('update-association');
Route::delete('association/{association}', [App\Http\Controllers\AssociationController::class, 'destroy'])->name('delete-association');

// Membership Routes
Route::get('memberships', [App\Http\Controllers\MembershipController::class, 'index'])->name('members');
Route::get('membership/create', [App\Http\Controllers\MembershipController::class, 'create'])->name('create-member');
Route::post('membership/store', [App\Http\Controllers\MembershipController::class, 'store'])->name('store-member');
Route::get('membership/{membership}/edit', [App\Http\Controllers\MembershipController::class, 'edit'])->name('edit-member');
Route::put('membership/{membership}', [App\Http\Controllers\MembershipController::class, 'update'])->name('update-member');
Route::get('membership/{membership}', [App\Http\Controllers\MembershipController::class, 'show'])->name('show-member');
Route::delete('membership/{membership}', [App\Http\Controllers\MembershipController::class, 'destroy'])->name('delete-member');

// beyond crud membership routes
Route::get('deactivated-members', [App\Http\Controllers\MembershipController::class, 'trashed'])->name('inactive-members');
Route::put('activate-member/{membership}', [App\Http\Controllers\MembershipController::class, 'restore'])->name('activate-member');
Route::get('association-members/{association}', [App\Http\Controllers\MembershipController::class, 'association'])->name('association-members');
Route::get('department-members/{department}', [App\Http\Controllers\MembershipController::class, 'department'])->name('department-members');

// ChatRoutes
Route::get('messaging', [App\Http\Controllers\MessageController::class, 'index'])->name('messaging');
Route::get('messages',  [App\Http\Controllers\MessageController::class, 'fetchMessages']);
Route::post('message', [App\Http\Controllers\MessageController::class, 'sendMessage']);
