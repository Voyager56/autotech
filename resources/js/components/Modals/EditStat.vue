<template>
    <div
        v-if="modal"
        class="text-white fixed left-[270px] z-10 backdrop-blur-sm flex justify-start"
    >
        <div
            ref="modalRef"
            class="border-[#6C757D] w-[50rem] h-fit text-white flex flex-col items-center justify-center"
        >
            <Form v-slot="{ meta, values }">
                <div>
                    <FormField
                        placeholder="დასახელება"
                        name="statistic"
                        type="text"
                        rules="required"
                        :value="weekTask.task_name"
                    />
                    <FormField
                        placeholder="განზომილება"
                        name="dimension"
                        type="number"
                        rules="required"
                        :value="weekTask.dimension"
                    />
                    <FormField
                        placeholder="რაოდენობა გასული კვირის"
                        name="pastWeeksAmount"
                        type="number"
                        rules="required"
                        :value="weekTask.past_weeks_amount"
                    />
                    <FormField
                        placeholder="კვოტა მიმდინარე კვირის	"
                        name="quotaForThisWeek"
                        type="number"
                        rules="required"
                        :value="weekTask.quota_for_this_week"
                    />
                    <FormField
                        placeholder="შენიშვნა"
                        name="note"
                        type="text"
                        :value="weekTask.note"
                    />
                </div>

                <button
                    :disabled="!meta.valid"
                    @click="editStat($event, values, weekTask.id)"
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
import { Form } from "vee-validate";
import { onClickOutside } from "@vueuse/core";
import { ref } from "vue";

defineProps({
    modal: {
        type: Boolean,
        required: true,
    },
    weekTask: {
        type: Object,
        required: true,
    },
});

const modalRef = ref(null);
const emit = defineEmits("close");

onClickOutside(modalRef, () => {
    emit("close");
});

const editStat = (e, values, id) => {
    e.preventDefault();
    axios.put(`/weeks-task/${id}`, values).then((res) => {
        window.location.reload();
    });
    console.log(values);
};
</script>
