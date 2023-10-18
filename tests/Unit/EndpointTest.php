<?php

use App\Http\Controllers\QuizPageController;
use App\Models\Answer;
use App\Outcome;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('results are returned by the controller', function() {
    app(DatabaseSeeder::class)->run();

    $results = [];

    // 3 introvert outcomes
    $results = array_merge(
        $results,
        Answer::query()
            ->where('outcome', 'like', Outcome::Introvert )
            ->inRandomOrder()
            ->limit(3)
            ->select(['id as selected'])
            ->get(['id'])
            ->toArray()
    );

    // 2 extrovert outcomes
    $results = array_merge(
        $results,
        Answer::query()
            ->where('outcome', 'like', Outcome::Extrovert )
            ->inRandomOrder()
            ->limit(2)
            ->select(['id as selected'])
            ->get(['id'])
            ->toArray()
    );

    $desired = Outcome::Introvert->value;

    $response = $this->post(url()->action([QuizPageController::class, 'result']), ['results' => $results]);
    $page = $response->assertInertia()->inertiaPage();

    expect($page['props']['result'])->toEqual($desired);
});

