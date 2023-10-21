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
                    :value="task.task_type"
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
                    <option value="unplanned_task">დაუგეგმავი ამოცანები</option>
                </Field>
                <ErrorMessage name="productType" class="text-[#e76f51]" />
                <FormField
                    placeholder="ამოცანის სახელი"
                    name="taskName"
                    type="text"
                    :value="task.task_name"
                    rules="required"
                />
                <FormField
                    placeholder="ამოცანის პროდუქტი"
                    name="productOfTask"
                    type="text"
                    :value="task.product_of_the_task"
                    rules="required"
                />
                <FormField
                    v-if="values.taskType !== 'unplanned_task'"
                    placeholder="დაგეგმილი დრო HH:MM:SS"
                    name="plannedDate"
                    type="text"
                    :value="task.planned_finish_time"
                    rules="required|time"
                />
                <FormField
                    placeholder="დასრულების დრო HH:MM:SS"
                    name="completionTime"
                    type="text"
                    :value="task.actual_finish_time"
                    rules="required|time"
                />
                <FormField
                    placeholder="დასრულების თარიღი"
                    name="completionDate"
                    type="datetime-local"
                    :value="
                        task.finished_date?.split(' ').join('T').slice(0, -3)
                    "
                    rules="required"
                />
                <button
                    :disabled="!meta.valid"
                    @click="editTask($event, values, task)"
                    class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
                >
                    ჩაასწორე სტატისტიკა
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

    task: {
        type: Object,
        required: true,
    },
});

const modalRef = ref(null);
const emit = defineEmits("close");

onClickOutside(modalRef, () => {
    emit("close");
});

const editTask = (e, values, task) => {
    e.preventDefault();

    axios
        .put(`tasks/${task.id}`, {
            ...values,
            completionDate: (values.completionDate = values.completionDate
                .split("T")
                .join(" ")),
        })
        .then((res) => {
            window.location.reload();
        });
};
</script>
