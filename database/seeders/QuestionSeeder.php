<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Collection;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question' => 'You’re really busy at work and a colleague is telling you their life story and personal woes. You:',
                'id' => 1
            ],
            [
                'question' => 'You’ve been sitting in the doctor’s waiting room for more than 25 minutes. You:',
                'id' => 2
            ],
            [
                'question' => 'You’re having an animated discussion with a colleague regarding a project that you’re in charge of. You:',
                'id' => 3
            ],
            [
                'question' => 'You are taking part in a guided tour of a museum. You:',
                'id' => 4
            ],
            [
                'question' => 'During dinner parties at your home, you have a hard time with people who:',
                'id' => 5
            ],
            [
                'question' => 'You crack a joke at work, but nobody seems to have noticed. You:',
                'id' => 6
            ],
            [
                'question' => 'This morning, your agenda seems to be free. You:',
                'id' => 7
            ],
            [
                'question' => 'During dinner, the discussion moves to a subject about which you know nothing at all. You:',
                'id' => 8
            ],
            [
                'question' => 'You’re out with a group of friends and there’s a person who’s quite shy and doesn’t talk much. You:',
                'id' => 9
            ],
            [
                'question' => 'At work, somebody asks for your help for the hundredth time. You:',
                'id' => 10
            ],
        ];

        foreach($questions as $index => $question) {
            $q = new Question;
            $q->question = $question['question'];
            $q->id = $question['id'];
            $q->save();

            $questions[$index] = $q;
        }

        return collect($questions);


    }
}
