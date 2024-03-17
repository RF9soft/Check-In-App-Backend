<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnvRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'app_name' => 'required|string|max:12',
            'domain_url' => 'required|url',
            'database_name' => 'required|string',
            'database_name' => 'required|string',
            'database_password' => 'nullable|string', 
        ];
    }
}
