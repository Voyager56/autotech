<template>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5 borde">
        <thead class="border border-violet-950">
            <tr>
                <th class="border border-violet-950 bg-[#b6cdec]">N</th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    {{ taskName }}
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    ამოცანის პროდუქტი
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    დაგეგმილი დრო
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    ფაქტიური დრო
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">
                    შესრულების თარიღი
                </th>
                <th class="border border-violet-950 bg-[#b6cdec]">Actions</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks">
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ index + 1 }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ task.task_name }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ task.product_of_the_task }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ task.planned_finish_time }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ task.actual_finish_time }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                {{ task.finished_date }}
            </td>
            <td class="border border-violet-950 bg-[#b6cdec]">
                <button
                    @click="openEditingModal(task)"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                >
                    რედაქტირება
                </button>
                <button
                    @click="deleteTask(task)"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                >
                    წაშლა
                </button>
            </td>
        </tbody>
        <tfoot>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="bg-slate-500">ჯამური დრო:</td>
            <td class="bg-slate-500">{{ taskTimes?.planned_time || 0 }}</td>
            <td class="bg-slate-500">{{ taskTimes?.actual_time || 0 }}</td>
        </tfoot>
    </table>

    <EditTask
        :task="selectedTask"
        :modal="taskModal"
        @close="taskModal = false"
    />
</template>

<script setup>
import EditTask from "./Modals/EditTask.vue";
import { ref } from "vue";

const taskModal = ref(false);
const selectedTask = ref(null);

const openEditingModal = (task) => {
    selectedTask.value = task;
    taskModal.value = true;
};

const deleteTask = (task) => {
    axios
        .delete(`/tasks/${task.id}`)
        .then((res) => {
            console.log(res);
            window.location.reload();
        })
        .catch((err) => {
            console.log(err);
        });
};

defineProps({
    taskName: {
        type: String,
        required: true,
    },
    tasks: {
        type: Object,
        required: false,
    },

    taskTimes: {
        type: Object,
        required: false,
    },
});
</script>
