<?php

namespace Modules\Extra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // 'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'type' => 'nullable|in:' . implode(',', array_column(\App\Enums\Type::cases(), 'value')),
            'status' => 'nullable|in:' . implode(',', array_column(\App\Enums\Status::cases(), 'value')),
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
