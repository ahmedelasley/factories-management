<?php

namespace Modules\Supplier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * The ID of the supplier being updated.
     */
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
            'name' => 'required|string|unique:suppliers,name,' . $this->id,
            'email' => 'nullable|email|unique:suppliers,email,' . $this->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
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
