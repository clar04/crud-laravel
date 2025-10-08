<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array($this->user()->role, ['admin', 'superadmin']);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
            'published' => 'boolean',
        ];
    }
}
