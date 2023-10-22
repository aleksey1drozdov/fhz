<?php
declare(strict_types=1);

use App\Http\Controllers\Api\ChatController;
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
Route::prefix('chat')->group(function () {
    Route::get('/history', [ChatController::class, 'history']);
    Route::post('/send', [ChatController::class, 'send']);
});
