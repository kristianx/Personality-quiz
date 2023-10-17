<script setup>
import { router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    quiz: {
        type: Object,
        required: true,
    },
});

const quizCompleted = ref(false);
const currentQuestion = ref(0);

const getCurrentQuestion = computed(() => {
    let question = props.quiz[currentQuestion.value];
    question.index = currentQuestion.value;
    return question;
});

const SetAnswer = (e) => {
    props.quiz[currentQuestion.value].selected = e.target.value;
    e.target.value = null;
};

const PreviousQuestion = () => {
    if (currentQuestion.value > 0) {
        currentQuestion.value--;
        return;
    }
};

const NextQuestion = () => {
    if (currentQuestion.value < props.quiz.length - 1) {
        currentQuestion.value++;
        return;
    }
    quizCompleted.value = true;
};
const everythingIsAnswered = () => {
    //return true if everything is answered
    return !props.quiz.some((question) => question.selected == null);
};
const FinishQuiz = () => {
    if (everythingIsAnswered()) {
        router.visit("/quiz", {
            method: "post",
            data: {
                results: props.quiz,
            },
        });
    }
};
</script>

<template>
    <main class="app">
        <h1 class="quiz-name">Personality Quiz</h1>

        <section class="quiz" v-if="!quizCompleted">
            <h1 class="question">{{ getCurrentQuestion.question }}</h1>
            <div class="answers">
                <label
                    v-for="answer in getCurrentQuestion.answers"
                    :for="'answer' + answer.id"
                    :class="`answer ${
                        getCurrentQuestion.selected != null &&
                        answer.id == getCurrentQuestion.selected
                            ? 'selected'
                            : ''
                    }`"
                >
                    <input
                        type="radio"
                        :id="'answer' + answer.id"
                        :name="getCurrentQuestion.index"
                        :value="answer.id"
                        v-model="getCurrentQuestion.selected"
                        @change="SetAnswer"
                    />
                    <span>{{ answer.answer }}</span>
                </label>
            </div>
            <hr class="divider" />
            <div class="inline width-100">
                <button
                    @click="PreviousQuestion"
                    :disabled="!currentQuestion > 0"
                    v-show="currentQuestion > 0"
                    class="secondary"
                >
                    Previous
                </button>


                <button
                    class="primary"
                    @click="NextQuestion"
                    :disabled="getCurrentQuestion.selected == null"
                    v-if="getCurrentQuestion.index != quiz.length - 1"
                >
                    {{
                        getCurrentQuestion.selected == null
                            ? "Select an option"
                            : "Next question"
                    }}
                </button>
                <button
                    class="primary complete"
                    @click="FinishQuiz"
                    v-if="getCurrentQuestion.index == quiz.length - 1 || everythingIsAnswered()"
                    :disabled="!everythingIsAnswered()"
                >
                    Finish
                </button>
            </div>
        </section>
        <div class="quiz-score">
            <p>{{ currentQuestion + 1 }}. out of {{ quiz.length }} questions</p>
            <div class="quiz-progress inline">
                <div
                    v-for="(question, index) in quiz"
                    :key="index"
                    class="question-item"
                    :class="question.selected != null ? 'answered' : ''"
                ></div>
            </div>
        </div>
    </main>
</template>

<style lang="scss" scoped>

.quiz {
    width: 100%;
    height: 100%;
    max-width: 750px;
    max-height: 600px;
    display: flex;
    flex-direction: column;
    padding: 50px 30px 30px;
    border-radius: 25px;
    background-color: #fff;
    box-shadow: 0px 6px 17px 0px rgba(0, 0, 0, 0.25);
    .question {
        font-size: 25px;
        color: #2e2e2e;
        padding-left: 30px;
    }
    .answers {
        flex: 1;
        .answer {
            display: block;
            cursor: pointer;
            color: #2e2e2e;
            font-weight: 500;
            font-size: 18px;
            padding: 20px 30px;
            border-radius: 25px;
            margin-bottom: 0.5rem;
            input {
                display: none;
            }
            &.selected {
                color: white;
                background-color: #3a66d4;
                &:hover {
                    color: white;
                    background-color: #3a66d4;
                }
            }
            &:hover {
                color: #2e2e2e;
                background-color: #f1f1f1;
            }
            &:last-of-type {
                margin-bottom: 0;
            }
        }
    }
}

.quiz-score {
    text-align: center;
    margin-top: 30px;
    p {
        color: white;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .quiz-progress {
        gap: 10px;
        .question-item {
            width: 20px;
            height: 20px;
            aspect-ratio: 1;
            border-radius: 50%;
            background-color: #242424;
            &.answered {
                background-color: #3a66d4;
            }
        }
    }
}
</style>
