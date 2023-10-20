<template>
    <Form
        v-slot="{ meta, values }"
        class="h-screen flex flex-col items-center justify-center"
    >
        <FormField
            placeholder="სახელი და გვარი"
            name="name"
            type="text"
            rules="required"
        />
        <button
            class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem] disabled:opacity-50"
            :disabled="!meta.valid"
            @click="createWeek($event, values)"
        >
            დაიწყე ახალი კვირა
        </button>
    </Form>
</template>

<script setup>
import FormField from "../components/FormField.vue";
import { Form } from "vee-validate";

const createWeek = (e, values) => {
    e.preventDefault();
    axios.post("/weeks-plan", values).then((res) => {
        window.location.href = res.data.redirect;
    });
};
</script>
