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
                    />
                    <FormField
                        placeholder="განზომილება"
                        name="dimension"
                        type="number"
                        rules="required"
                    />
                    <FormField
                        placeholder="რაოდენობა გასული კვირის	"
                        name="pastWeeksAmount"
                        type="number"
                        rules="required"
                    />
                    <FormField
                        placeholder="კვოტა მიმდინარე კვირის	"
                        name="quotaForThisWeek"
                        type="number"
                        rules="required"
                    />
                    <FormField placeholder="შენიშვნა" name="note" type="text" />
                </div>

                <button
                    @click="addStatistic($event, values, weekId)"
                    class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
                >
                    დაამატე სტატისტიკა
                </button>
            </Form>
        </div>
    </div>
</template>

<script setup>
import FormField from "../components/FormField.vue";
import { Form } from "vee-validate";
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

const addStatistic = (e, values, weekId) => {
    e.preventDefault();
    axios.post(`/weeks-task/${weekId}`, values).then((res) => {
        window.location.reload();
    });
};
</script>
