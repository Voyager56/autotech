<template>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    სტატისტიკები
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    დასახელება
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    განზომილება
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    რაოდენობა გასული კვირის
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    კვოტა მიმდინარე კვირის
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">შენიშვნა</th>
                <th class="border border-violet-950 bg-[#b6cdec]">Actions</th>
            </tr>
        </thead>
        <tbody v-for="(plan, index) in weeks_tasks">
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ index + 1 }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ plan.task_name }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ plan.dimension }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ plan.past_weeks_amount }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ plan.quota_for_this_week }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ plan.note }}
            </td>
            <td
                class="border border-violet-950 bg-[#b6cdec] flex justify-around"
            >
                <button @click="deleteStat(plan.id)">წაშლა</button>
                <button>შესწორება</button>
            </td>
        </tbody>
    </table>
    <button
        @click="addStatModal = true"
        class="bg-[#b6cdec] my-2 border-[#6C757D] border-[2px] px-3 py-2 w-[20rem]"
    >
        დაამატე სტატისტიკა
    </button>
    <AddStat
        :modal="addStatModal"
        :weekId="weekId"
        @close="addStatModal = false"
    />
</template>

<script setup>
import AddStat from "./AddStat.vue";
import { ref } from "vue";

const addStatModal = ref(false);

const deleteStat = (id) => {
    axios.delete(`/weeks-task/${id}`).then((res) => {
        window.location.reload();
    });
};

defineProps({
    weeks_tasks: {
        type: Object,
        required: true,
    },

    weekId: {
        type: Number,
        required: true,
    },
});
</script>
