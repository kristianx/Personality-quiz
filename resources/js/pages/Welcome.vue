<template>
    <div class="container">
        <h1>Welcome to the personality test page!</h1>
        <p>Take a quick 5 question test and see what is your personality type.</p>
        <a href="/quiz" class="btn btn-primary">Take the test</a>
    </div>
</template>

<script>
export default {};
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
</style>
