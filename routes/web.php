<?php

use App\Http\Controllers\QuizPageController;
use App\Http\Controllers\ResultsPageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/quiz', [ QuizPageController::class, 'index']);
Route::post('/quiz', [ QuizPageController::class, 'result']);

