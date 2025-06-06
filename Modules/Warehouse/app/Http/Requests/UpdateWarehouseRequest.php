<?php

namespace Modules\Warehouse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Warehouse\Enums\WarehouseType;

class UpdateWarehouseRequest extends FormRequest
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
            'name' => 'required|string|unique:warehouses,name,' . $this->id,
            'location' => 'nullable|string',
            'capacity' => 'nullable|numeric|min:0|max:999999.9999',
            'is_default' => 'nullable|boolean',

            // 'employeeable_type' => 'nullable|string|max:255',
            // 'employeeable_id'   => 'nullable|integer|min:1',
            'type' => ['nullable', new Enum(WarehouseType::class)],
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
