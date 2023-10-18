<?php

use App\Models\Answer;
use App\Outcome;
use App\OutcomeProcessor;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function() {
    app(DatabaseSeeder::class)->run();
});


test('outcome can be introvert', function() {
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

    $resolver = new OutcomeProcessor($results);


    expect($resolver->decide()->value)->toBe(Outcome::Introvert->value);
});



test('outcome can be extrovert', function() {
    $results = [];

    // 2 introvert outcomes
    $results = array_merge(
        $results,
        Answer::query()
            ->where('outcome', 'like', Outcome::Introvert )
            ->inRandomOrder()
            ->limit(2)
            ->select(['id as selected'])
            ->get(['id'])
            ->toArray()
    );

    // 3 extrovert outcomes
    $results = array_merge(
        $results,
        Answer::query()
            ->where('outcome', 'like', Outcome::Extrovert )
            ->inRandomOrder()
            ->limit(3)
            ->select(['id as selected'])
            ->get(['id'])
            ->toArray()
    );

    $resolver = new OutcomeProcessor($results);

    expect($resolver->decide()->value)->toBe(Outcome::Extrovert->value);
});



test('outcome is tied', function() {
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

    // 3 extrovert outcomes
    $results = array_merge(
        $results,
        Answer::query()
            ->where('outcome', 'like', Outcome::Extrovert )
            ->inRandomOrder()
            ->limit(3)
            ->select(['id as selected'])
            ->get(['id'])
            ->toArray()
    );

    $resolver = new OutcomeProcessor($results);

    expect($resolver->decide()->value)->toBe(Outcome::Half->value);
});
