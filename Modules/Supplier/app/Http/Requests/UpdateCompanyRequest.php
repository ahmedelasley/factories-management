<?php

namespace Modules\Supplier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'required|string|unique:companies,name,' . $this->id,
            'email' => 'nullable|email|unique:companies,email,' . $this->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
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
