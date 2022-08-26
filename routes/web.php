<?php

use Illuminate\Support\Facades\Gate;
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
    return view('firstPage');
})->name('root');

Route::get('/dashboard', function () {

    $response = Gate::inspect('view', auth()->user());

    if ($response->allowed()){
        $user = \App\Models\User::find(auth()->user()->id)->first();
        $posts = \App\Models\Post::all()->sortByDesc('created_at');

        return view('main', ['user' => $user, 'posts' => $posts]);
    }
    elseif ($response->denied()){
        auth()->logout();
        return redirect()->route('root')->with(['notAccepted' => 'Your account isn\'t accepted yet']);
    }


})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function ()
{
    Route::resource('profile', \App\Http\Controllers\EditProfileController::class)->only(['update', 'index']);

    Route::resource('post', \App\Http\Controllers\PostController::class)->middleware(['admin']);

    Route::resource('accept-users', \App\Http\Controllers\AcceptUsersController::class)->middleware(['admin']);

});

require __DIR__.'/auth.php';
