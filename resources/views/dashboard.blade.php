<x-app>
    <home :weeks-plan="{{ $weeksPlan }}" :tasks="{{ $tasks }}"
        :task-times="{{ json_encode($timeForEachTaskType) }}" :total-time="{{ json_encode($totalTime) }}"
        :redirect="{{ json_encode(route('weeks-plan.create')) }}">
    </home>
</x-app>
