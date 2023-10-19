<template>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th>N</th>
                <th>{{ taskName }}</th>
                <th>ამოცანის პროდუქტი</th>
                <th>დაგეგმილი დრო</th>
                <th>ფაქტიური დრო</th>
                <th>შესრულების თარიღი</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks">
            <td>{{ index + 1 }}</td>
            <td>{{ task.task_name }}</td>
            <td>{{ task.product_of_the_task }}</td>
            <td>{{ task.planned_finish_time }}</td>
            <td>{{ task.actual_finish_time }}</td>
            <td>{{ task.finished_date }}</td>
        </tbody>
        <thead class="pt-[100px]">
            <td class="border-0"></td>
            <td></td>
            <td>ჯამური დრო:</td>
            <td>{{ taskTimes?.planned_time || 0 }}</td>
            <td>{{ taskTimes?.actual_time || 0 }}</td>
        </thead>
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

<style scpoed>
th {
    background-color: #e2e8f0;
}

table,
th,
td {
    border: 1px solid;
}
</style>
