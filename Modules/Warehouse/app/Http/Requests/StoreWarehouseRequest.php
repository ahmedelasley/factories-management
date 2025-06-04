<?php

namespace Modules\Warehouse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Warehouse\Enums\WarehouseType;

class StoreWarehouseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:warehouses,name',
            'location' => 'required|string',
            'capacity' => 'nullable|numeric|min:0|max:999999.9999',
            'is_default' => 'nullable|boolean',

            // 'employeeable_type' => 'nullable|string|max:255',
            // 'employeeable_id'   => 'nullable|integer|min:1',
            'type' => ['required', new Enum(WarehouseType::class)],
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
