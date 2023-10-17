import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import HomeVue from "./pages/Home.vue";

createApp({
    components: {
        home: HomeVue,
    },
}).mount("#app");
