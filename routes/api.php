<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/courses', 'APIController@courses');
Route::middleware('auth:sanctum')->get('/subjects', 'APIController@subjects');
Route::middleware('auth:sanctum')->get('/lessons', 'APIController@lessons');
Route::middleware('auth:sanctum')->get('/questions', 'APIController@questions');
Route::middleware('auth:sanctum')->get('/answers', 'APIController@answers');

Route::middleware('auth:sanctum')->get('/game_events', 'APIController@game_events');
Route::middleware('auth:sanctum')->get('/event_leaderboards/{event}', 'APIController@eventLeaderboards');

Route::middleware('auth:sanctum')->get('/courses/{course}', 'APIController@courseSubjects');
Route::middleware('auth:sanctum')->get('/lessons/{lesson}', 'APIController@lessonQuestions');
Route::middleware('auth:sanctum')->get('/version', 'APIController@version');
Route::middleware('auth:sanctum')->get('/leaderboards/{course}', 'APIController@leaderboards');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
