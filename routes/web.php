<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chatController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('auth/user', function (){
    if (auth()->check()){
        return response()->json([
            'authUser' => auth()->user()
        ]);
        return  null;
    }
});

Route::get('chat/{chat}/get_users', [chatController::class, 'getUsers'])->name('chat.getUsers');

Route::get('chat/{chat}/get_messages', [chatController::class,'getMessages'])->name('chat.getMessages');
//Route::get('chat/{chat}/get_messages', 'App\Http\Controllers\chatController@getMessages')->name('chat.getMessages');

Route::get('chat/with/{user}', [chatController::class, 'chatWith'] )->name('chat.with');

Route::get('chat/{chat}', [chatController::class, 'show'])->name('chat.show');




Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'internal', 'middleware' => ['jwt.verify','admin']], function(){
    Route::get('sockets/serve', function(){
        \Illuminate\Support\Facades\Artisan::call('websockets:serve');
    });
});