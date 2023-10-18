<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Outcome;
use App\OutcomeProcessor;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Resources\QuestionResource;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class QuizPageController extends Controller
{
    public function index(){

        $quiz = QuestionResource::collection(Question::query()->with('answers')->inRandomOrder()->take(5)->get());
        if($quiz->count() != 0){
            return Inertia::render('Quiz', [
                'quiz' => $quiz
            ]);
        }
        return Inertia::render('Welcome', [
            'errors' => ['error' => 'There are no questions in this quiz!']
        ]);

    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function result(){

        $results = request()->get('results');

        $outcome = app(OutcomeProcessor::class, ['results' => $results])->decide();

        return Inertia::render('ResultsPage', ['result' => $outcome->value]);
    }
}
