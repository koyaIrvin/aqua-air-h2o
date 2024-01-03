<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create-message', [PostController::class, 'createMessage']);
Route::get('/read-messages', function(){
    $posts = Post::all();
    return $posts;
});
Route::get('/edit-message/{post}', [PostController::class, function($postId){
    $post = Post::find($postId);
    return $post;
}]);
Route::get('/update-message/{post}', [PostController::class, 'updateMessage']);
Route::delete('/delete-message/{post}', [PostController::class, 'deleteMessage']);