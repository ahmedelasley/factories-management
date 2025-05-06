<?php

namespace Modules\Setting\Services;

use Illuminate\Validation\Rule;

class SettingValidationService
{
    public function rules(string $dataType): array
    {
        $rules = [];

        if (in_array($dataType, ['string', 'email', 'integer'])) {
            $rules['value'][] = 'required';
        }

        if ($dataType === 'string') {
            $rules['value'][] = 'string';
            $rules['value'][] = 'min:3';
            $rules['value'][] = 'max:255';
        }

        if ($dataType === 'email') {
            $rules['value'][] = 'email';
        }

        if ($dataType === 'integer') {
            $rules['value'][] = 'integer';
        }

        return $rules;
    }
}
