<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActionLogWithTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'required', 'string',
            'type' => 'required', 'string',
        ];
    }

    public function getMessage(): string
    {
        $data = $this->safe()->collect();

        return $data->get('message');
    }

    public function getType(): string
    {
        $data = $this->safe()->collect();

        return $data->get('type');
    }
}
