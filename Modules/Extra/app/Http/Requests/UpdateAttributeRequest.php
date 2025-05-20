<?php

namespace Modules\Extra\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Status;

class UpdateAttributeRequest extends FormRequest
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
            'attribute' => 'required|string|unique:attributes,attribute,' . $this->id,
            // 'status' => ['sometimes', new Enum(Status::class)],
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
