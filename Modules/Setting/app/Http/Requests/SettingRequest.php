<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Setting\Enums\SettingType;
use Modules\Setting\Enums\SettingDataType;
use Modules\Setting\Enums\SettingStatus;

class SettingRequest extends FormRequest
{

    /**
     * The setting instance.
     *
     * @var \Modules\Setting\Models\Setting
     */
    protected $setting;
    public function __construct( $setting = null)
    {
        $this->setting = $setting;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'value' => [
                'sometimes',
                Rule::requiredIf(fn () => in_array($this->setting->data_type, ['string', 'email', 'integer'])),
                Rule::when(fn () => $this->data_type === 'string', ['string', 'min:3', 'max:255']),
                Rule::when(fn () => $this->data_type === 'email', ['email']),
                Rule::when(fn () => $this->data_type === 'integer', ['integer']),
            ],

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     */
    public function attributes(): array
    {
        return [

        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([

        ]);
    }

    
        
}
