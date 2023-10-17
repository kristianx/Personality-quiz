<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Outcome;
use App\OutcomeProcessor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\QuestionResource;

class QuizPageController extends Controller
{
    public function index(){

        $quiz = QuestionResource::collection(Question::query()->with('answers')->get());

        return Inertia::render('Quiz', [
            'quiz' => $quiz
        ]);

    }
    public function result(){

        $results = request()->get('results');

        $outcome = app(OutcomeProcessor::class, ['results' => $results])->decide();

        return Inertia::render('ResultsPage', ['result' => $outcome->value]);
    }
}
