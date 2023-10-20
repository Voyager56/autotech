<template>
    <div class="flex justify-between">
        <div class="flex flex-col text-lg text-gray-950">
            <div class="flex">
                <p class="pr-2">კვირის საწყისი თარიღი:</p>
                <p>{{ weeksPlan.start_of_week }}</p>
            </div>
            <div class="flex">
                <p class="pr-2">სახელი გვარი:</p>
                <p>{{ weeksPlan.first_last_name }}</p>
            </div>
        </div>
        <a
            :href="redirect"
            class="border-2 rounded-md bg-[#e2e8f0] h-[2rem] mt-3 mr-3"
            >დაიწყე ახალი კვირა</a
        >
    </div>
    <WeeksTasks :weeks_tasks="weeksPlan.weeks_tasks" :weekId="weeksPlan.id" />
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
    <table
        class="table-fixed border-spacing-2 w-[100%] text-left mt-5 bg-[#466184]"
    >
        <thead>
            <tr>
                <th class="border-0"></th>
                <th class="border-0"></th>
                <th>ჯამური დრო:</th>
                <th>{{ totalTime.planned_time }}</th>
                <th>{{ totalTime.actual_time }}</th>
                <th class="border-0"></th>
            </tr>
        </thead>
    </table>
</template>

<script setup>
import TaskTable from "../components/TaskTable.vue";
import WeeksTasks from "../components/WeeksTasks.vue";

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

    redirect: {
        type: String,
        required: true,
    },
});
</script>
