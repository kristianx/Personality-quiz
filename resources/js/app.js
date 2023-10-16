import "./bootstrap";
import { createApp } from "vue";
import * as VueRouter from "vue-router";

import App from "./components/App.vue";
import Welcome from "./pages/Welcome.vue";
import Quiz from "./pages/Quiz.vue";

const routes = [{ path: "/", component: Welcome }];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes,
});

const app = createApp(App);
app.use(router);

app.mount("#app");
