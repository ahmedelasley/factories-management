<?php

namespace Modules\Material\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
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
            'name'              => 'required|string|max:255',
            'description'       => 'nullable|string|max:1000',
            'storage_unit'      => 'required|string|max:50',
            'ingredient_unit'   => 'required|string|max:50',
            'conversion_factor' => 'required|numeric|min:0',
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
