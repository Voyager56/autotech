<template>
    <div
        v-if="modal"
        class="text-white fixed left-[270px] z-10 backdrop-blur-sm flex top-[10rem]"
    >
        <div
            ref="modalRef"
            class="border-[#6C757D] w-[50rem] h-fit text-white flex flex-col items-center justify-center"
        >
            <Form v-slot="{ meta, values }">
                <Field
                    id="Task Type"
                    rules="required"
                    name="taskType"
                    as="select"
                    class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
                >
                    <option value="" disabled>დავალების ტიპი</option>
                    <option value="programming_and_project_task">
                        ამოცანები პროგრამებისა და პროექტებისთვის
                    </option>
                    <option value="quota_task">
                        კვოტის მისაღწევად საჭირო ამოცანები
                    </option>
                    <option value="regular_task">რეგულარული ამოცანები</option>
                    <option value="training_task">
                        ამოცანები ტრენინგებთან მიმართებაში
                    </option>
                </Field>
                <ErrorMessage name="productType" class="text-[#e76f51]" />
                <FormField
                    placeholder="ამოცანის სახელი"
                    name="taskName"
                    type="text"
                    rules="required"
                />
                <FormField
                    placeholder="ამოცანის პროდუქტი"
                    name="productOfTask"
                    type="text"
                    rules="required"
                />
                <FormField
                    placeholder="დაგეგმილი დრო HH:MM:SS"
                    name="plannedDate"
                    type="text"
                    rules="required|time"
                />
                <button
                    @click="addTask($event, values, weekId)"
                    class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
                >
                    დაამატე სტატისტიკა
                </button>
            </Form>
        </div>
    </div>
</template>

<script setup>
import FormField from "../FormField.vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { onClickOutside } from "@vueuse/core";
import { ref } from "vue";

defineProps({
    modal: {
        type: Boolean,
        required: true,
    },

    weekId: {
        type: Number,
        required: true,
    },
});

const modalRef = ref(null);
const emit = defineEmits("close");

onClickOutside(modalRef, () => {
    emit("close");
});

const addTask = (e, values, weekId) => {
    e.preventDefault();
    axios.post(`tasks/${weekId}`, values).then((res) => {
        window.location.reload();
    });
};
</script>
