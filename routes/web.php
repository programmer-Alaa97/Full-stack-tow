<?php
use App\Http\Livewire\MassegeRec;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth']], function () {

// Route Users
Route::prefix('admin')->group(function () {
    
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');  
Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
Route::get('/user/admin/{id}',  [UsersController::class, 'admin'])->name('user.admin');
Route::get('/user/not/admin/{id}',  [UsersController::class, 'notAdmin'] )->name('user.not.admin');

// Route Message
Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');
Route::get('/message/delete/{id}', [MessageController::class, 'destroy'])->name('message.destroy');

});


Route::get('/message/send', [MessageController::class, 'create'])->name('message.send');

Route::get('/message/received/{id}', [MessageController::class, 'show'])->name('messages.received');
Route::view('/messages/show_Form','/messages/show_Form')->name('messages.show_Form'); //livewire


// route user front end
Route::get('/', 'frontEndController@index')->name('index');

});




