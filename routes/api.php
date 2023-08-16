<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;

use App\Http\Controllers\Api\V1\PostController as PostControllerV1;
use App\Http\Controllers\Api\V2\PostController as PostControllerV2;
use App\Http\Controllers\Api\V1\SubscriptionController;

Route::prefix('v1')->group(function () {
    Route::apiResource('subscriptions', SubscriptionController::class);
});

Route::apiResource('v1/posts', PostControllerV1::class)->only(['index', 'show', 'destroy','store']);
Route::apiResource('v2/posts', PostControllerV2::class)->only(['index']);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/hello', function () {
    return 'Hello World';
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





//Route::apiResource('v1/posts', PostController::class)->only(['index', 'show', 'destroy']);



/*
POST /api/v1/subscription
Content-Type: application/json

{
  "id": 2,  
  "user_id": 1,
  "website_id": 2,
}
*/


/*
POST /api/v1/posts
Content-Type: application/json

{
  "website_id": 1,
  "title": "Test3 Title",
  "description": "Desc. Test3",
  "user_id": 1,
}
*/


