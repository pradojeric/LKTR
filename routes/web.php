<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Courses as CourseResources;
use App\Course;

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

Auth::routes([
    'register' => false, 'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function(){
   return redirect()->route('home');
});

Route::get('/token/{code}', function($code){
    if($code == "arzA-Game+20")
        return csrf_token();
    else
        return "error";
});

Route::post('/uploadScore/{code}', 'LeaderboardController@uploadScore');
Route::post('/storeUser/{code}', 'ElektroUserController@storeUser');
Route::post('/updateUser/{code}', 'ElektroUserController@updateUser');
Route::get('/getDownloadBar/{code}', 'APIController@progressBar');

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

    Route::resource('game_events', 'GameEventController')->middleware('can:admin-only');
    Route::resource('game_events.event_users', 'EventUserController')->shallow()->middleware('can:admin-only');

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

