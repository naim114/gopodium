<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TeamController;
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
 *  home - frontpage of website
 */
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('main');

Route::get(
    '/s/home',
    [HomeController::class, 'index']
)->name('main.home');

Route::get(
    '/s/tournament',
    [HomeController::class, 'tournament']
)->name('main.tourney');

Route::get(
    '/s/tournament/team',
    [HomeController::class, 'tournament_team']
)->name('main.tourney.team');

Route::get(
    '/s/tournament/athlete',
    [HomeController::class, 'tournament_athlete']
)->name('main.tourney.athlete');

Route::get(
    '/s/tournament/event',
    [HomeController::class, 'tournament_event']
)->name('main.tourney.event');

Route::get(
    '/s/tournament/event/result',
    [HomeController::class, 'tournament_event_result']
)->name('main.tourney.event_result');

Route::get(
    '/s/tournament/schedule',
    [HomeController::class, 'tournament_schedule']
)->name('main.tourney.schedule');

Route::get(
    '/s/tournament/result',
    [HomeController::class, 'tournament_result']
)->name('main.tourney.result');

Route::get(
    '/s/tournament/standing',
    [HomeController::class, 'tournament_standing']
)->name('main.tourney.standing');

Route::get(
    '/s/help/faq',
    [HomeController::class, 'help_faq']
)->name('main.help.faq');

Route::get(
    '/s/help/manual',
    [HomeController::class, 'help_manual']
)->name('main.help.manual');

Route::get(
    '/s/contact',
    [HomeController::class, 'contact']
)->name('main.contact');

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
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard')->middleware('auth');


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
     * plan
     */
    Route::get(
        '/plan',
        [PlanController::class, 'index']
    )->name('plan')->middleware('permissions:plan');

    Route::post(
        '/plan/add',
        [PlanController::class, 'add']
    )->name('plan.add')->middleware('permissions:plan');

    Route::post(
        '/plan/edit',
        [PlanController::class, 'edit']
    )->name('plan.edit')->middleware('permissions:plan');

    Route::post(
        '/plan/delete',
        [PlanController::class, 'delete']
    )->name('plan.delete')->middleware('permissions:plan');

    /**
     *  notification
     */
    Route::get(
        '/notification',
        [NotificationController::class, 'index']
    )->name('notification');

    Route::get(
        '/notification/view/{id}',
        [NotificationController::class, 'view']
    )->name('notification.view');

    Route::post(
        '/notification/add',
        [NotificationController::class, 'add']
    )->name('notification.add')->middleware('permissions:notification');

    Route::post(
        '/notification/delete',
        [NotificationController::class, 'delete']
    )->name('notification.delete');

    /**
     *  payment
     */
    Route::get(
        '/payment',
        [PaymentController::class, 'index']
    )->name('payment');

    /**
     *  team
     */
    Route::get(
        '/teams',
        [TeamController::class, 'index']
    )->name('team');

    /**
     *  tournament - manage tournament ---> TODO restrict to non owner
     */
    Route::get(
        '/manage',
        [TournamentController::class, 'manage']
    )->name('tournament.manage');

    Route::get(
        '/tournament/{id}',
        [TournamentController::class, 'index']
    )->name('tournament')->middleware('tournament.permission');

    Route::post(
        '/tournament/edit/detail',
        [TournamentController::class, 'detail']
    )->name('tournament.edit.detail')->middleware('tournament.permission');

    Route::post(
        '/tournament/edit/rule',
        [TournamentController::class, 'rule']
    )->name('tournament.edit.rule')->middleware('tournament.permission');

    Route::post(
        '/tournament/edit/logo',
        [TournamentController::class, 'logo']
    )->name('tournament.edit.logo')->middleware('tournament.permission');

    /**
     * Team
     */
    Route::get(
        '/tournament/{tournament_id}/team',
        [TournamentController::class, 'team']
    )->name('tournament.team')->middleware('tournament.permission');

    Route::get(
        '/tournament/{tournament_id}/team/{team_id}/manage',
        [TournamentController::class, 'team_manage']
    )->name('tournament.team.manage');

    Route::post(
        '/tournament/team/add',
        [TournamentController::class, 'team_add']
    )->name('tournament.team.add');

    Route::post(
        '/tournament/team/edit/detail',
        [TournamentController::class, 'team_detail']
    )->name('tournament.team.edit.detail');

    Route::post(
        '/tournament/team/edit/logo',
        [TournamentController::class, 'team_logo']
    )->name('tournament.team.edit.logo');

    Route::post(
        '/tournament/team/delete',
        [TournamentController::class, 'team_delete']
    )->name('tournament.team.delete');

    /**
     * Team Athletes
     */
    Route::get(
        '/tournament/{tournament_id}/team/{team_id}/athletes',
        [TournamentController::class, 'team_athlete']
    )->name('tournament.team.athletes');

    Route::post(
        '/tournament/team/athlete/add',
        [TournamentController::class, 'team_athlete_add']
    )->name('tournament.team.athlete.add');

    Route::post(
        '/tournament/team/athlete/edit',
        [TournamentController::class, 'team_athlete_edit']
    )->name('tournament.team.athlete.edit');

    Route::post(
        '/tournament/team/athlete/delete',
        [TournamentController::class, 'team_athlete_delete']
    )->name('tournament.team.athlete.delete');

    // TODO
    Route::get(
        '/team/athlete',
        [TournamentController::class, 'team_athlete_schedule_result']
    )->name('tournament.team.athlete');

    // TODO
    Route::get(
        '/team/event',
        [TournamentController::class, 'team_event']
    )->name('tournament.team.event');

    // TODO
    Route::get(
        '/team/schedule',
        [TournamentController::class, 'team_schedule']
    )->name('tournament.team.schedule');

    // TODO
    Route::get(
        '/team/result',
        [TournamentController::class, 'team_result']
    )->name('tournament.team.result');

    // TODO get by id all of the above

    /**
     * Event
     */
    Route::get(
        'tournament/{tournament_id}/event',
        [TournamentController::class, 'event']
    )->name('tournament.event')->middleware('tournament.permission');

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
        '/standing',
        [TournamentController::class, 'standing']
    )->name('tournament.standing');
});