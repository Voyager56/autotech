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
    <TaskTable
        :taskName="'ამოცანები პროგრამებისა და პროექტებისთვის'"
        :tasks="tasks.programming_and_project_task"
        :taskTimes="taskTimes.programming_and_project_task"
    />
    <TaskTable
        :taskName="`კვოტის მისაღწევად საჭირო ამოცანები`"
        :tasks="tasks.quota_task"
        :taskTimes="taskTimes.quota_task"
    />
    <TaskTable
        :taskName="`რეგულარული ამოცანები`"
        :tasks="tasks.regular_task"
        :taskTimes="taskTimes.regular_task"
    />
    <TaskTable
        :taskName="`საბაზისო და ტექნიკური მომსახურება`"
        :tasks="tasks.training_task"
        :taskTimes="taskTimes.training_task"
    />
    <table class="table-fixed border-spacing-2 w-[100%] text-left mt-5">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>ჯამური დრო:</th>
                <th>{{ totalTime.planned_time }}</th>
                <th>{{ totalTime.actual_time }}</th>
                <th></th>
            </tr>
        </thead>
    </table>
</template>

<script setup>
import TaskTable from "../components/TaskTable.vue";
defineProps({
    weeksPlan: {
        type: Object,
        required: true,
    },

    tasks: {
        type: Object,
        required: true,
    },

    taskTimes: {
        type: Object,
        required: true,
    },

    totalTime: {
        type: Object,
        required: true,
    },
});
</script>

<style scoped></style>
