let isNotificationVisible;
<template>
    <div class="container">
        <img src="https://images.unsplash.com/photo-1521220546621-cf34a1165c67?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=3552&q=80" alt="Personalities" class="header-image">
        <h1>Welcome to the personality test page!</h1>
        <p>Take a quick 5 question test and see what is your personality type.</p>
        <button @click="router.visit('/quiz')" class="primary">Take the test</button>
        <div v-if="errorExist && isNotificationVisible" class="error" >
            {{ errors.error }}
        </div>
    </div>
</template>

<script setup>
import {router} from "@inertiajs/vue3";
import {computed, onMounted, ref} from "vue";

const props = defineProps({
    errors:{
        type: Object,
        default: null
    }
});

onMounted(() => {
    setTimeout(() => {
        isNotificationVisible.value = false
    }, 3000)
});

let isNotificationVisible = ref(true);

const errorExist = computed(() => Object.keys(props.errors).length !== 0);

</script>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

body {
    color: #fff;
    background-color: #212121;
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
.mr-20{
    margin-right: 20px;
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
        &:hover {
            background-color: #3156b1;
        }
    }
    &.secondary {
        color: #3a66d4;
        border: 2px solid #eee;
        font-size: 18px;
        background-color: transparent;
        &:hover {
            border: 2px solid #3a66d4;
        }
    }
    &.complete {
        background-color: #3a9d44;
        &:hover {
            background-color: #2d7d35;
        }
    }
}

button:disabled {
    opacity: 0.5;
}
.error{
    position: fixed;
    top: 30px;
    right: 30px;
    display: inline-block;
    filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.05));
    background-color:#E28888;
    padding: 20px 30px;
    border-radius: 25px;
}
</style>

<style lang="scss" scoped>
.container{
    text-align: center;
}
.header-image{
    margin-top: 50px;
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 25px;

}
h1{
    margin: 25px 0 10px;
}
button{

}
</style>
