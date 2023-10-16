<script setup>
import { ref, computed } from "vue";

const quiz = ref({
    quizName: "The Quiz",
    questions: [
        {
            id: 0,
            question: "What is Vue?",
            options: {
                0: "A framework",
                1: "A library",
                2: "A type of hat",
            },
            selected: null,
        },
        {
            id: 1,
            question: "What is Vuex used for?",
            options: {
                0: "Eating a delicious snack",
                1: "Viewing things",
                2: "State management",
            },
            selected: null,
        },
        {
            id: 2,
            question: "What is Vue Router?",
            options: {
                0: "An ice cream maker",
                1: "A routing library for Vue",
                2: "Burger sauce",
            },
            selected: null,
        },
    ],
});

const quizCompleted = ref(false);
const currentQuestion = ref(0);

const getCurrentQuestion = computed(() => {
    let question = quiz.value.questions[currentQuestion.value];
    question.index = currentQuestion.value;
    return question;
});

const SetAnswer = (e) => {
    quiz.value.questions[currentQuestion.value].selected = e.target.value;
    e.target.value = null;
};

const PreviousQuestion = () => {
    if (currentQuestion.value > 0) {
        currentQuestion.value--;
        return;
    }
};

const NextQuestion = () => {
    if (currentQuestion.value < quiz.value.questions.length - 1) {
        currentQuestion.value++;
        return;
    }

    quizCompleted.value = true;
};
const everythingIsAnswered = () => {
    //return true if everything is answered
    return !quiz.value.questions.some((question) => question.selected == null);
};
const FinishQuiz = () => {
    if (everythingIsAnswered()) {
        console.log(quiz.value.questions);
    }
};
</script>

<template>
    <main class="app">
        <h1 class="quiz-name">{{ quiz.quizName }}</h1>

        <section class="quiz" v-if="!quizCompleted">
            <h1 class="question">{{ getCurrentQuestion.question }}</h1>
            <div class="options">
                <label
                    v-for="(option, index) in getCurrentQuestion.options"
                    :for="'option' + index"
                    :class="`option ${
                        getCurrentQuestion.selected != null &&
                        index == getCurrentQuestion.selected
                            ? 'selected'
                            : ''
                    }`"
                >
                    <input
                        type="radio"
                        :id="'option' + index"
                        :name="getCurrentQuestion.index"
                        :value="index"
                        v-model="getCurrentQuestion.selected"
                        @change="SetAnswer"
                    />
                    <span>{{ option }}</span>
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
                    class="primary complete"
                    @click="FinishQuiz"
                    v-if="getCurrentQuestion.index == quiz.questions.length - 1"
                    :disabled="!everythingIsAnswered()"
                >
                    Finish
                </button>
                <button
                    class="primary"
                    @click="NextQuestion"
                    :disabled="!getCurrentQuestion.selected"
                    v-else
                >
                    {{
                        getCurrentQuestion.selected == null
                            ? "Select an option"
                            : "Next question"
                    }}
                </button>
            </div>
        </section>
        <div class="quiz-score">
            <p>
                {{ currentQuestion + 1 }}. out of
                {{ quiz.questions.length }} questions
            </p>
            <div class="quiz-progress inline">
                <div
                    v-for="(question, index) in quiz.questions"
                    :key="index"
                    class="question-item"
                    :class="question.selected != null ? 'answered' : ''"
                ></div>
            </div>
        </div>
    </main>
</template>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

body {
    color: #fff;
    background-color: #2e2e2e;
}

.app {
    padding: 2rem;
    height: 100vh;
    display: flex;
    align-items: center;
    flex-direction: column;
}
.width-100 {
    width: 100%;
}
.inline {
    display: inline-flex;
    justify-content: space-between;
}
h1 {
    font-size: 2rem;
    margin-bottom: 2rem;
}
h2 {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 2rem;
}

p {
    color: #8f8f8f;
    font-size: 1.5rem;
    text-align: center;
}
hr.divider {
    border: none;
    height: 2px;
    color: #bdbdbd;
    background-color: #bdbdbd;
    margin: 20px 0;
}
button {
    border: none;
    outline: none;
    cursor: pointer;
    appearance: none;
    padding: 20px 35px;
    border-radius: 20px;
    text-transform: uppercase;
    &.primary {
        color: #fff;
        font-size: 18px;
        background-color: #3a66d4;
    }
    &.secondary {
        color: #3a66d4;
        border: 2px solid #eee;
        font-size: 18px;
        background-color: transparent;
    }
    &.complete {
        background-color: #3a9d44;
    }
}

button:disabled {
    opacity: 0.5;
}

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
    .options {
        flex: 1;
        .option {
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
