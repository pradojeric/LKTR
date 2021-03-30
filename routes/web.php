<?php

use App\User;
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

Route::get('/', 'HomeController@welcome');

Auth::routes([
    'register' => false, 'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function()
{
    Route::resource('abilities', 'AbilityController')->middleware('can:admin-only');
    Route::resource('roles', 'RoleController')->middleware('can:admin-only');

    Route::resource('users', 'UserController');
    Route::resource('teachers', 'TeacherController')->middleware('can:admin-only');
    Route::get('/teachers/role/{teacher}', 'TeacherController@changeRole')->name('teachers.role')->middleware('can:admin-only');
    Route::put('/teachers/role/{teacher}', 'TeacherController@updateRole')->name('teachers.role.update')->middleware('can:admin-only');
    Route::get('/teachers/courses/{teacher}', 'TeacherController@changeCourses')->name('teachers.courses')->middleware('can:admin-only');
    Route::put('/teachers/courses/{teacher}', 'TeacherController@updateCourses')->name('teachers.courses.update')->middleware('can:admin-only');

    Route::prefix('/events/')->middleware('can:admin-only')->group(function(){
        Route::resource('game_events', 'GameEventController');
        Route::resource('game_events.event_users', 'EventUserController')->shallow();

        Route::get('/game_events/send_event_code/{event_user}', 'EventUserController@sendEventCode')->name('send_event_code');
        Route::get('/game_events/revoke_code/{event_user}', 'EventUserController@revokeCode')->name('revoke_code');
        Route::delete('/delete/event_users/{game_event}', 'EventUserController@deleteAll')->name('delete_event_users');

        Route::get('/event/{game_event}/leaderboard', 'EventLeaderboardController@index')->name('event_leaderboard');
        Route::delete('/event/{game_event}/delete_leaderboard', 'EventLeaderboardController@destroyAll')->name('delete_event_leaderboard');

        Route::resource('game_events.event_categories', 'EventCategoryController')->shallow();
        Route::resource('event_categories.event_questions', 'EventQuestionController')->shallow();

        Route::get('/get_categories/', 'EventQuestionController@getCategories');

        Route::post('/enable/{question}', 'EventQuestionController@enable');
        Route::get('/copy/{category_id}/{question_id}', 'EventQuestionController@copy')->name('event_question.copy');
        Route::get('/move/{category_id}/{question_id}', 'EventQuestionController@move')->name('event_question.move');
    });

    Route::resource('courses', 'CourseController');
    Route::get('/courses/restore/{trashed_course}', 'CourseController@restoreCourse')->name('courses.restore');

    Route::resource('courses.subjects', 'SubjectController')->shallow();
    Route::resource('subjects.lessons', 'LessonController')->shallow();
    Route::resource('lessons.questions', 'QuestionController')->shallow();

    Route::prefix('/question')->group(function()
    {
        Route::get('/get_courses/', 'QuestionController@getCourses');
        Route::get('/get_subjects/{id}', 'QuestionController@getSubjects');
        Route::get('/get_lessons/{id}', 'QuestionController@getLessons');

        Route::get('/copy/{lesson_id}/{question_id}', 'QuestionController@copy')->name('question.copy');
        Route::get('/move/{lesson_id}/{question_id}', 'QuestionController@move')->name('question.move');

        Route::post('/enable/{question}', 'QuestionController@enable');
    });

    Route::resource('versions', 'VersionController');

    Route::delete('/destroyToken', 'UserController@destroyToken')->name('destroy-token')->middleware('can:admin-only');
    Route::get('/all-subjects', 'SubjectController@viewAll')->name('subjects');

});

// Route::get('/videos', 'VideosController@index')->name('videos');
// Route::get('/viewvideos', 'VideosController@show')->name('viewvideos');
// Route::get('/uploadvideo', 'VideosController@create')->name('uploadvideo');

