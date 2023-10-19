<x-app>
    <home :weeks-plan="{{ $weeksPlan }}" :tasks="{{ $tasks }}"
        :task-times="{{ json_encode($timeForEachTaskType) }}" :total-time="{{ json_encode($totalTime) }}">
    </home>
</x-app>
