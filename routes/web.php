<?php

use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersNotificationsController;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskInProgressNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");
Route::get('/service', function () {
    return view("customer.service");
})->name("service");
Route::get("/contact", [ContactController::class, 'index'])
    ->name("contact");
Route::post("/contact", [ContactController::class, 'contact'])
    ->name("contact.contact");

/**
 * --------------------------------------------
 * route's users connected
 * --------------------------------------------
 */

Route::middleware(['auth', 'customer', 'verified'])->group(function () {
    Route::delete('/utilisateur/notifications/{id}', [UsersNotificationsController::class, 'delete'])
        ->name('user.notification.delete');
    Route::get('/utilisateur/dashboard', [CustomerDashboardController::class, "index"])
        ->name('customer.dashboard');
    Route::post('/utilisateur/dashboard', [CustomerDashboardController::class, "index"]);
    Route::get('/utilisateur/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/utilisateur/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/utilisateur/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::resource("utilisateur/task", TaskController::class)->except(['create', 'edit']);
    Route::get('/task/export', [TaskController::class, 'export'])
        ->name('customer.task.export');
    Route::get('/task/deleteAll', [TaskController::class, 'deleteAll'])
        ->name('task.delAll');
    Route::post('/task/import', [TaskController::class, 'import'])
        ->name('customer.task.import');
    Route::get('/utilisateur/notifications', [UsersNotificationsController::class, 'show'])
        ->name('user.notifications');
    Route::get("/tasks/accomplished", [CustomerDashboardController::class, 'getChartTasks']);
});





/**
 * --------------------------------------------
 * Admin's route connected
 * --------------------------------------------
 */
Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get("/admin/mon-profil", [ProfilController::class, 'show'])
        ->name('admin.profil');
    Route::post('/admin/mon-profil', [ProfilController::class, 'update']);
    Route::get('/admin/mes-clients', [UserController::class, 'index'])
        ->name('admin.userList');
    Route::delete('/admin/mes-client/{user}', [UserController::class, 'destroy'])
        ->name('admin.userList.destroy');
    Route::get('/admin/tasks-list', [AdminTaskController::class, 'lists'])
        ->name('admin.tasks');
    Route::get('/admin/les-notifications', [NotificationsController::class, 'all'])
        ->name('admin.notifications');
    Route::get('/admin/mes-clients/{email}/{user}', [UserController::class, 'show'])
        ->name('admin.userList.show');
});

require __DIR__ . '/auth.php';
