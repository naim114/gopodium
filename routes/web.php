<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

/**
 *  ban - route to redirect to if user status is Banned
 */
Route::get('/ban', function () {
    return view('errors.ban');
})->name('ban');

// ======================================================================================== //
// Auth Routes
// generated from laravel/ui package
// php artisan route:list to see if the routes is really there
// ======================================================================================== //

Auth::routes();

// ======================================================================================== //
// Authorised (Logged In) Routes
// only authorised user can access these route
// ======================================================================================== //

Route::group(['middleware' => ['auth', 'status']], function () {
    /**
     *  test - test route
     */
    Route::get(
        '/test/{id}',
        [TestController::class, 'index']
    )->name('test')->middleware('permissions:users.activity');

    /**
     *  dashboard - index route
     */
    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard')->middleware('auth');;


    /**
     *  profile - manage personal profile
     */
    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('profile')->middleware('auth');

    Route::post(
        '/avatar',
        [ProfileController::class, 'storeAvatar']
    )->name('profile.avatar')->middleware('auth');

    Route::post(
        '/update/profile',
        [ProfileController::class, 'updateProfile']
    )->name('profile.update_profile')->middleware('auth');

    Route::post(
        '/update/auth',
        [ProfileController::class, 'updateAuth']
    )->name('profile.update_auth')->middleware('auth');

    /**
     *  activity - personal activity log
     */
    Route::get(
        '/activity',
        [ActivityLogController::class, 'index']
    )->name('activity')->middleware('auth');

    /**
     *  users - manage users
     */
    Route::get(
        '/users',
        [UsersController::class, 'index']
    )->name('users')->middleware('permissions:users.manage');

    Route::get(
        '/users/{action}/{id}',
        [UsersController::class, 'view']
    )->name('users.view')->middleware('permissions:users.manage');

    Route::post(
        '/users/add',
        [UsersController::class, 'add']
    )->name('users.add')->middleware('permissions:users.manage');

    Route::post(
        '/users/avatar',
        [UsersController::class, 'avatar']
    )->name('users.avatar')->middleware('permissions:users.manage');

    Route::post(
        '/users/edit',
        [UsersController::class, 'edit']
    )->name('users.edit')->middleware('permissions:users.manage');

    Route::post(
        '/users/ban',
        [UsersController::class, 'ban']
    )->name('users.ban')->middleware('permissions:users.manage');

    Route::post(
        '/users/delete',
        [UsersController::class, 'delete']
    )->name('users.delete')->middleware('permissions:users.manage');

    // all user
    Route::get(
        '/users/activity',
        [UsersController::class, 'activityAll']
    )->name('users.users_activity')->middleware('permissions:users.activity');

    /**
     *  roles - manage roles
     */
    Route::get(
        '/roles',
        [RoleController::class, 'index']
    )->name('roles')->middleware('permissions:roles.manage');

    Route::post(
        '/roles/add',
        [RoleController::class, 'add']
    )->name('roles.add')->middleware('permissions:roles.manage');

    Route::post(
        '/roles/edit',
        [RoleController::class, 'edit']
    )->name('roles.edit')->middleware('permissions:roles.manage');

    Route::post(
        '/roles/delete',
        [RoleController::class, 'delete']
    )->name('roles.delete')->middleware('permissions:roles.manage');

    /**
     *  permissions - manage permissions
     */
    Route::get(
        '/permissions',
        [PermissionController::class, 'index']
    )->name('permissions')->middleware('permissions:permissions.manage');

    Route::post(
        '/permissions/add',
        [PermissionController::class, 'add']
    )->name('permissions.add')->middleware('permissions:permissions.manage');

    Route::post(
        '/permissions/edit',
        [PermissionController::class, 'edit']
    )->name('permissions.edit')->middleware('permissions:permissions.manage');

    Route::post(
        '/permissions/delete',
        [PermissionController::class, 'delete']
    )->name('permissions.delete')->middleware('permissions:permissions.manage');

    Route::get(
        '/permissions/role/view/{id}',
        [PermissionController::class, 'permission_role']
    )->name('permissions_role')->middleware('permissions:permissions.manage');

    Route::post(
        '/permissions/role/add',
        [PermissionController::class, 'permission_role_add']
    )->name('permissions_role.add')->middleware('permissions:permissions.manage');

    Route::post(
        '/permissions/role/delete',
        [PermissionController::class, 'permission_role_delete']
    )->name('permissions_role.delete')->middleware('permissions:permissions.manage');

    /**
     *  settings - manage settings
     */
    Route::get(
        '/settings',
        [SettingsController::class, 'index']
    )->name('settings')->middleware('permissions:settings.general');

    Route::post(
        '/settings/update',
        [SettingsController::class, 'update']
    )->name('settings.update')->middleware('permissions:settings.general');

    Route::post(
        '/settings/color',
        [SettingsController::class, 'color']
    )->name('settings.color')->middleware('permissions:settings.general');

    Route::post(
        '/settings/color/default',
        [SettingsController::class, 'color_default']
    )->name('settings.color.default')->middleware('permissions:settings.general');

    Route::post(
        '/settings/wallpaper/auth',
        [SettingsController::class, 'wallpaper_auth']
    )->name('settings.wallpaper.auth')->middleware('permissions:settings.general');

    Route::post(
        '/settings/logo',
        [SettingsController::class, 'logo']
    )->name('settings.logo')->middleware('permissions:settings.general');

    Route::post(
        '/settings/favicon',
        [SettingsController::class, 'favicon']
    )->name('settings.favicon')->middleware('permissions:settings.general');

    /**
     *  tournament - manage tournament ---> TODO restrict to non owner
     */
    Route::get(
        '/manage',
        [TournamentController::class, 'manage']
    )->name('tournament.manage');

    // TODO get by tournament id
    Route::get(
        '/tournament',
        [TournamentController::class, 'index']
    )->name('tournament');

    /**
     * Team
     */
    Route::get(
        '/team',
        [TournamentController::class, 'team']
    )->name('tournament.team');

    // TODO get by id for all of below
    Route::get(
        '/team/manage',
        [TournamentController::class, 'team_manage']
    )->name('tournament.team.manage');

    Route::get(
        '/team/athletes',
        [TournamentController::class, 'team_athlete']
    )->name('tournament.team.athletes');

    Route::get(
        '/team/athlete',
        [TournamentController::class, 'team_athlete_schedule_result']
    )->name('tournament.team.athlete');

    Route::get(
        '/team/event',
        [TournamentController::class, 'team_event']
    )->name('tournament.team.event');

    Route::get(
        '/team/schedule',
        [TournamentController::class, 'team_schedule']
    )->name('tournament.team.schedule');

    Route::get(
        '/team/result',
        [TournamentController::class, 'team_result']
    )->name('tournament.team.result');

    // TODO get by id all of the above

    /**
     * Event
     */
    Route::get(
        '/event',
        [TournamentController::class, 'event']
    )->name('tournament.event');

    // TODO get by id
    Route::get(
        '/event/manage',
        [TournamentController::class, 'event_manage']
    )->name('tournament.event.manage');

    // TODO get by id
    Route::get(
        '/event/settings',
        [TournamentController::class, 'event_settings']
    )->name('tournament.event.settings');

    Route::get(
        '/schedule',
        [TournamentController::class, 'schedule']
    )->name('tournament.schedule');

    Route::get(
        '/result',
        [TournamentController::class, 'result']
    )->name('tournament.result');

    Route::get(
        '/result/event',
        [TournamentController::class, 'result_event']
    )->name('tournament.result.event');

    Route::get(
        '/program',
        [TournamentController::class, 'program']
    )->name('tournament.program');
});