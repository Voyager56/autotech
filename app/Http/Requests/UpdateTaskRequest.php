<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            "taskName" => ["required", "string", "max:255"],
            "plannedDate" => ["required_if:taskType,programming_and_project_task,quota_task,regular_task,training_task", "date_format:Y-m-d"],
            "completionTime" => ["required", "date_format:H:i:s"],
            "taskType" => ["required", "string", "max:255"],
            "productOfTask" => ["required", "string", "max:255"],
            "completionDate" => ["required", "date_format:Y-m-d H:i"],
        ];
    }
}
