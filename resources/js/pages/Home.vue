<template>
    <div class="flex flex-col">
        <div class="flex">
            <p class="pr-2">კვირის საწყისი თარიღი:</p>
            <p>{{ weeksPlan.start_of_week }}</p>
        </div>
        <div class="flex">
            <p class="pr-2">სახელი გვარი:</p>
            <p>{{ weeksPlan.first_last_name }}</p>
        </div>
    </div>
    <table
        class="table-fixed border-spacing-2 w-[100%] text-left mt-5"
        v-for="(plan, index) in weeksPlan.weeks_tasks"
    >
        <thead>
            <tr>
                <th>სტატისტიკები</th>
                <th>დასახელება</th>
                <th>განზომილება</th>
                <th>რაოდენობა გასული კვირის</th>
                <th>კვოტა მიმდინარე კვირის</th>
                <th>შენიშვნა</th>
            </tr>
        </thead>
        <tbody>
            <td>{{ index + 1 }}</td>
            <td>{{ plan.task_name }}</td>
            <td>{{ plan.dimension }}</td>
            <td>{{ plan.past_weeks_amount }}</td>
            <td>{{ plan.quota_for_this_week }}</td>
            <td>{{ plan.note }}</td>
        </tbody>
    </table>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th>N</th>
                <th>ამოცანები პროგრამებისა და პროექტებისთვის</th>
                <th>ამოცანის პროდუქტი</th>
                <th>დაგეგმილი დრო</th>
                <th>ფაქტიური დრო</th>
                <th>შესრულების თარიღი</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks.programming_and_project_task">
            <td>{{ index + 1 }}</td>
            <td>{{ task.task_name }}</td>
            <td>{{ task.product_of_the_task }}</td>
            <td>{{ task.planned_finish_time }}</td>
            <td>{{ task.actual_finish_time }}</td>
            <td>{{ task.finished_date }}</td>
        </tbody>
    </table>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th>N</th>
                <th>კვოტის მისაღწევად საჭირო ამოცანები</th>
                <th>ამოცანის პროდუქტი</th>
                <th>დაგეგმილი დრო</th>
                <th>ფაქტიური დრო</th>
                <th>შესრულების თარიღი</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks.quota_task">
            <td>{{ index + 1 }}</td>
            <td>{{ task.task_name }}</td>
            <td>{{ task.product_of_the_task }}</td>
            <td>{{ task.planned_finish_time }}</td>
            <td>{{ task.actual_finish_time }}</td>
            <td>{{ task.finished_date }}</td>
        </tbody>
    </table>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th>N</th>
                <th>რეგულარული ამოცანები</th>
                <th>ამოცანის პროდუქტი</th>
                <th>დაგეგმილი დრო</th>
                <th>ფაქტიური დრო</th>
                <th>შესრულების თარიღი</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks.regular_task">
            <td>{{ index + 1 }}</td>
            <td>{{ task.task_name }}</td>
            <td>{{ task.product_of_the_task }}</td>
            <td>{{ task.planned_finish_time }}</td>
            <td>{{ task.actual_finish_time }}</td>
            <td>{{ task.finished_date }}</td>
        </tbody>
    </table>
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th>N</th>
                <th>ამოცანები პროგრამებისა და პროექტებისთვის</th>
                <th>ამოცანის პროდუქტი</th>
                <th>დაგეგმილი დრო</th>
                <th>ფაქტიური დრო</th>
                <th>შესრულების თარიღი</th>
            </tr>
        </thead>
        <tbody v-for="(task, index) in tasks.training_task">
            <td>{{ index + 1 }}</td>
            <td>{{ task.task_name }}</td>
            <td>{{ task.product_of_the_task }}</td>
            <td>{{ task.planned_finish_time }}</td>
            <td>{{ task.actual_finish_time }}</td>
            <td>{{ task.finished_date }}</td>
        </tbody>
    </table>
</template>

<script setup>
defineProps({
    weeksPlan: {
        type: Object,
        required: true,
    },

    tasks: {
        type: Array,
        required: true,
    },
});

// "programming_and_project_task", "quota_task", "regular_task", "training_task"

const taskTypes = {
    programming_and_project_task: "პროგრამირება და პროექტები",
    quota_task: "კვოტები",
    regular_task: "რეგულარი დავალება",
    training_task: "ტრენინგი",
};
</script>

<style scoped>
table,
th,
td {
    border: 1px solid;
}
</style>
