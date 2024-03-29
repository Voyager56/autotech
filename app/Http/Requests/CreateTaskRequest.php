<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "taskType" => ["required", "string"],
            "plannedDate" => ["required_if:taskType,programming_and_project_task,quota_task,regular_task,training_task", "date_format:Y-m-d"],
            "productOfTask" => ["required", "string"],
            "taskName" => ["required", "string"],
        ];
    }
}
