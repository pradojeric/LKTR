<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Courses as CourseResource;
use App\Http\Resources\Subjects as SubjectResource;
use App\Http\Resources\Lessons as LessonResource;
use App\Http\Resources\Questions as QuestionResource;
use App\Http\Resources\Answers as AnswerResource;
use App\Http\Resources\CourseSubjects as CourseSubjectResource;
use App\Http\Resources\LessonQuestions as LessonQuestionResource;
use App\Http\Resources\Version as VersionResource;
use App\Http\Resources\Leaderboards as LeaderboardResource;
use App\Course;
use App\Subject;
use App\Question;
use App\Answer;
use App\Lesson;
use App\Version;
use App\Leaderboard;


class APIController extends Controller
{
    //
    public function courses()
    {
        return CourseResource::collection(Course::all());
    }

    public function subjects()
    {
        return SubjectResource::collection(Subject::all());
    }

    public function lessons()
    {
        return LessonResource::collection(Lesson::all());
    }

    public function questions()
    {
        return QuestionResource::collection(Question::all());
    }

    public function answers()
    {
        return AnswerResource::collection(Answer::all());
    }

    public function courseSubjects($id)
    {
        return new CourseSubjectResource(Course::findOrFail($id));
    }

    public function lessonQuestions($id)
    {
        return new LessonQuestionResource(Lesson::findOrFail($id));
    }

    public function version()
    {
        return new VersionResource(Version::first());
    }

    public function progressBar($code)
    {
        if($code != "arzA-Game+20") return "Unauthorized";

        $tableRows = DB::select('SELECT "Courses" as title, Count(*) as number from courses
            UNION SELECT "Subjects" as title, Count(*) as number from subjects
            UNION SELECT "Lessons" as title, Count(*) as number from lessons
            UNION SELECT "Questions" as title, Count(*) as number from questions
            UNION SELECT "Answers" as title, Count(*) as number from answers'
        );

        return response()->json($tableRows);
    }

    public function leaderboards($id)
    {
        return LeaderboardResource::collection(Leaderboard::where('course_id', $id)->orderBy('score', 'desc')->orderBy('created_at', 'desc')->get(20));
    }
}
