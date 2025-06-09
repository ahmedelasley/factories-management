<?php

namespace Modules\Employees\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Employees\Enums\EmployeeStatus;
class StoreEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:employees,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'gender' => ['required', 'in:male,female'],
            'national_id' => ['nullable', 'string'],
            // 'department_id' => ['required', 'exists:departments,id'],
            // 'position_id' => ['required', 'exists:positions,id'],
            'hire_date' => ['required', 'date'],
            'status' => [new Enum(EmployeeStatus::class)],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
