<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrgController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrgCrudController;
use App\Http\Controllers\EvCrudController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\OrgAuthController;
use App\Http\Controllers\OrgEvController;
use App\Http\Controllers\EventRegisterController;
use App\Http\Controllers\OrgRegisterController;
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

/*Route::get('/', function () {
    return view('index');
});
*/
//rute user
Route::get('/', [PagesController::class, 'portal'])->name('portal');
Route::get('/userHome', [PagesController::class, 'userHome']);
Route::get('/userEvents', [UserAuthController::class, 'listEvents'])->name('user.event');
Route::get('/userEvents/{event}', [UserAuthController::class, 'showEvent'])->name('user.event.show');
Route::get('/userLogin', [UserAuthController::class, 'login'])->name('userLogin');
Route::post('/userLogin', [UserAuthController::class, 'pastlogin'])->name('userLogin.store');
Route::get('/userRegister', [UserAuthController::class, 'register'])->name('userRegister');
Route::post('/userRegister', [UserAuthController::class, 'pastregister'])->name('userRegister.store');
Route::get('/user/register', [EventRegisterController::class, 'daftar'])->name('register');
Route::post('/user/register', [EventRegisterController::class, 'store'])->name('register.store');
//Route::get('/userRegister', [UserController::class, 'Register']);
//Route::get('/evRegistration', [UserController::class, 'daftar']);
//rute organizer
Route::get('/orgHome', [PagesController::class, 'orgHome']);
Route::get('/orgLogin', [OrgAuthController::class, 'getLogin'])->name('orgLogin');
Route::post('/orgLogin', [OrgAuthController::class, 'postLogin'])->name('orgLogin.store');
Route::get('/orgRegister', [OrgAuthController::class, 'Register'])->name('orgRegister');
Route::post('/orgRegister', [OrgAuthController::class, 'postRegister'])->name('orgRegister.store');
//Route::get('/addEvent', [OrgController::class, 'add']);
//middleware test
Route::get('/adminLogin',[AdminAuthController::class,'login'])->name('adminLogin');
Route::post('/adminLogin',[AdminAuthController::class,'pastlogin']);
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/adminHome', [PagesController::class, 'admHome'])->name('adminHome');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('users', AdminController::class);
        Route::resource('organizers', OrgCrudController::class);
        Route::get('/events/create', [EvCrudController::class, 'create'])->name('admin.events.create');
        Route::get('/events/{event}', [EvCrudController::class, 'show'])->name('admin.events.show');
        Route::get('/events', [EvCrudController::class, 'index'])->name('admin.events.index');
        Route::post('/events', [EvCrudController::class, 'store'])->name('admin.events.store');
        Route::get('/events/{event}/edit', [EvCrudController::class, 'edit'])->name('admin.events.edit');
        Route::put('/events/{event}', [EvCrudController::class, 'update'])->name('admin.events.update');
        Route::delete('/events/{event}', [EvCrudController::class, 'destroy'])->name('admin.events.destroy');
        Route::put('/events/{event}', [EvCrudController::class, 'approve'])->name('admin.events.approve');
        //Route::resource('events', EvCrudController::class)->name('admin.events');
        // Route::get('home', [HomeController::class, 'index'])->name('home');
    });
    Route::middleware(['user'])->group(function () {
        Route::get('/userProfile', [UserController::class, 'profile'])->name('userProfile');
        Route::get('userLogout', [UserAuthController::class, 'logout'])->name('userLogout');
        Route::get('/user/details', [UserAuthController::class, 'show'])->name('user.details');
        Route::get('/user/lists', [UserAuthController::class, 'showRegister'])->name('user.lists');
        Route::delete('user/lists/{registration}', [EventRegisterController::class, 'destroy'])->name('user.lists.destroy');
        Route::get('/user/edit', [UserAuthController::class, 'edit'])->name('user.edit');
        Route::put('/user/edit', [UserAuthController::class, 'update'])->name('user.update');
        Route::get('/user/edit/password', [UserAuthController::class, 'editPassword'])->name('user.edit.password');
        Route::put('/user/edit/password', [UserAuthController::class, 'updatePassword'])->name('user.update.password');
        Route::get('/user/edit/desc', [UserAuthController::class, 'editDesc'])->name('user.edit.desc');
        Route::put('/user/edit/desc', [UserAuthController::class, 'updateDesc'])->name('user.update.desc');
        //Route::get('user', [UserController::class, 'index']);
    });
    /*
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
    */
});
Route::group(['prefix'=>'organizer','middleware' => 'auth:organizer'],function () {
    Route::get('/', [OrgController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [OrgAuthController::class, 'postLogout'])->name('org.logout');
    Route::get('/details', [OrgAuthController::class, 'show'])->name('org.details');
    Route::get('/edit', [OrgAuthController::class, 'edit'])->name('org.edit');
    Route::put('/edit', [OrgAuthController::class, 'update'])->name('org.update');
    Route::get('/edit/password', [OrgAuthController::class, 'editPassword'])->name('org.edit.pass');
    Route::put('/edit/password', [OrgAuthController::class, 'updatePassword'])->name('org.update.pass');
    Route::get('/edit/desc', [OrgAuthController::class, 'editDesc'])->name('org.edit.desc');
    Route::put('/edit/desc', [OrgAuthController::class, 'updateDesc'])->name('org.update.desc');
    Route::resource('events', OrgEvController::class);
    Route::get('/registered', [OrgRegisterController::class, 'list'])->name('org.reg.list');
    Route::put('/registered', [OrgRegisterController::class, 'approve'])->name('org.reg.approve');

});
/*rute admin-user-crud
Route::get('/users', [AdminController::class, 'index']);
Route::get('/users/create', [AdminController::class, 'create']);
Route::get('/users/{user}', [AdminController::class, 'show']);
Route::post('/users', [AdminController::class, 'store']);
Route::delete('/users/{user}', [AdminController::class, 'destroy']);
Route::get('/users/{user}/edit', [AdminController::class, 'edit']);
Route::put('/users/{user}', [AdminController::class, 'update']);
*/
//auth admin saja
/*
Route::get('/adminLogin',[AdminAuthController::class,'login'])->name('adminLogin');
Route::post('/adminLogin',[AdminAuthController::class,'pastlogin']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/adminHome', [PagesController::class, 'admHome'])->name('adminHome');
    // Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::resource('users', AdminController::class);
    Route::resource('organizers', OrgCrudController::class);  
});
//Route::resource('users', AdminController::class);
//rute admin-crud-organizer
/*Route::get('/organizers', [OrgCrudController::class, 'index']);
Route::get('/organizers/create', [OrgCrudController::class, 'create']);
Route::get('/organizers/{organizer}', [OrgCrudController::class, 'show']);
Route::post('/organizers', [OrgCrudController::class, 'store']);
Route::get('/organizers/{organizer}/edit', [OrgCrudController::class, 'edit']);
Route::put('/organizers/{organizer}', [OrgCrudController::class, 'update']);
Route::delete('/organizers/{organizer}', [OrgCrudController::class, 'destroy']);*/
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
