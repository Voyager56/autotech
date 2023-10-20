import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import HomeVue from "./pages/Home.vue";
import CreateWeek from "./pages/CreateWeek.vue";
import "./config/vee-validate/index.js";

createApp({
    components: {
        home: HomeVue,
        "create-week": CreateWeek,
    },
}).mount("#app");
