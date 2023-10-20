<template>
    <div class="flex flex-col">
        <Field
            :name="name"
            :type="type"
            :rules="rules"
            :placeholder="placeholder"
            :value="value"
            class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
        />
        <ErrorMessage :name="name" />
    </div>
</template>

<script setup>
import { Field, ErrorMessage } from "vee-validate";

defineProps({
    name: {
        type: String,
        required: true,
    },

    type: {
        type: String,
        required: true,
    },

    placeholder: {
        type: String,
        required: false,
    },

    rules: {
        type: String,
        required: false,
    },

    value: {
        type: String,
        required: false,
    },
});
</script>
