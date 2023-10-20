<template>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5 borde">
        <thead class="border border-violet-950">
            <tr>
                <th class="border border-violet-950 bg-[#e2e8f0]">N</th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    {{ taskName }}
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    ამოცანის პროდუქტი
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    დაგეგმილი დრო
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    ფაქტიური დრო
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    შესრულების თარიღი
                </th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks">
            <td class="border border-violet-950">{{ index + 1 }}</td>
            <td class="border border-violet-950">{{ task.task_name }}</td>
            <td class="border border-violet-950">
                {{ task.product_of_the_task }}
            </td>
            <td class="border border-violet-950">
                {{ task.planned_finish_time }}
            </td>
            <td class="border border-violet-950">
                {{ task.actual_finish_time }}
            </td>
            <td class="border border-violet-950">{{ task.finished_date }}</td>
        </tbody>
        <tfoot>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="bg-slate-500">ჯამური დრო:</td>
            <td class="bg-slate-500">{{ taskTimes?.planned_time || 0 }}</td>
            <td class="bg-slate-500">{{ taskTimes?.actual_time || 0 }}</td>
        </tfoot>
    </table>
</template>

<script setup>
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
