<?php

namespace Modules\Extra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{

    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->id,
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer|min:1|exists:categories,id',
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
