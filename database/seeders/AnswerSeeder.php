<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use \Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use App\Outcome;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Collection $questions): void
    {
        $answers = [
            [
                'answer'     => 'Don’t dare to interrupt them',
                'id' => 1,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Think it’s more important to give them some of your time; work can wait',
                'id' => 1,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Listen, but with only with half an ear',
                'id' => 1,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Interrupt and explain that you are really busy at the moment',
                'id' => 1,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Look at your watch every two minutes',
                'id' => 2,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Bubble with inner anger, but keep quiet',
                'id' => 2,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Explain to other equally impatient people in the room that the doctor is always running late',
                'id' => 2,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Complain in a loud voice, while tapping your foot impatiently',
                'id' => 2,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Don’t dare contradict them',
                'id' => 3,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Think that they are obviously right',
                'id' => 3,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Defend your own point of view, tooth and nail',
                'id' => 3,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Continuously interrupt your colleague',
                'id' => 3,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Are a bit too far towards the back so don’t really hear what the guide is saying',
                'id' => 4,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Follow the group without question',
                'id' => 4,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Make sure that everyone is able to hear properly',
                'id' => 4,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Are right up the front, adding your own comments in a loud voice',
                'id' => 4,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Ask you to tell a story in front of everyone else',
                'id' => 5,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Talk privately between themselves',
                'id' => 5,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Hang around you all evening',
                'id' => 5,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Always drag the conversation back to themselves',
                'id' => 5,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Think it’s for the best — it was a lame joke anyway',
                'id' => 6,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Wait to share it with your friends after work',
                'id' => 6,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Try again a bit later with one of your colleagues',
                'id' => 6,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Keep telling it until they pay attention',
                'id' => 6,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Know that somebody will find a reason to come and bother you',
                'id' => 7,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Heave a sigh of relief and look forward to a day without stress',
                'id' => 7,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Question your colleagues about a project that’s been worrying you',
                'id' => 7,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Pick up the phone and start filling up your agenda with meetings',
                'id' => 7,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Don’t dare show that you don’t know anything about the subject',
                'id' => 8,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Barely follow the discussion',
                'id' => 8,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Ask lots of questions to learn more about it',
                'id' => 8,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Change the subject of discussion',
                'id' => 8,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Notice that they’re alone, but don’t go over to talk with them',
                'id' => 9,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Go and have a chat with them',
                'id' => 9,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Shoot some friendly smiles in their direction',
                'id' => 9,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Hardly notice them at all',
                'id' => 9,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Give them a hand, as usual',
                'id' => 10,
                'outcome'    => Outcome::Extrovert,
            ],
            [
                'answer'     => 'Accept — you’re known for being helpful',
                'id' => 10,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Ask them, please, to find somebody else for a change',
                'id' => 10,
                'outcome'    => Outcome::Introvert,
            ],
            [
                'answer'     => 'Loudly make it known that you’re annoyed',
                'id' => 10,
                'outcome'    => Outcome::Extrovert,
            ],

        ];

        $answers = collect($answers)->groupBy->id;

        foreach ($answers as $id => $_answers) {
            foreach ($_answers as $order => $answer) {
                $q = $questions->first(fn($el) => $el->id == $id);
                if ($q) {
                    $ans = new Answer;
                    $ans->answer  = $answer['answer'];
                    $ans->outcome = $answer['outcome'];
                    $ans->order   = $order + 1;
                    $q->answers()->save($ans);
                }
            }
        }
    }
}
