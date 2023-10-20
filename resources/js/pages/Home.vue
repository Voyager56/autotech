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
    <table
        class="table-fixed border-spacing-2 w-[100%] text-left mt-5"
        v-for="(plan, index) in weeksPlan.weeks_tasks"
    >
        <thead>
            <tr>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    სტატისტიკები
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    დასახელება
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    განზომილება
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    რაოდენობა გასული კვირის
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">
                    კვოტა მიმდინარე კვირის
                </th>
                <th class="border border-violet-950 bg-[#e2e8f0]">შენიშვნა</th>
            </tr>
        </thead>
        <tbody>
            <td class="border border-violet-950">
                {{ index + 1 }}
            </td>
            <td class="border border-violet-950">
                {{ plan.task_name }}
            </td>
            <td class="border border-violet-950">
                {{ plan.dimension }}
            </td>
            <td class="border border-violet-950">
                {{ plan.past_weeks_amount }}
            </td>
            <td class="border border-violet-950">
                {{ plan.quota_for_this_week }}
            </td>
            <td class="border border-violet-950">
                {{ plan.note }}
            </td>
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
