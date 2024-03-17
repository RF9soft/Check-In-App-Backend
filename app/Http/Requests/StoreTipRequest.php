<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTipRequest extends FormRequest
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
            'tips_title' => 'required|string|max:50|unique:tips',
            'category_id' => 'required|integer',
            'league_name' => 'required|string|max:50',
            'team_one' => 'required|string|max:50',
            'team_one_image'=>'required',
            'team_two' => 'required|string|max:50',
            'team_two_image'=>'required',
            'team_one_score' => 'required',
            'team_two_score' => 'required',
            'date_time' => 'required',
          'odds_value' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],            'status' => 'required|in:Pending,Win,Loss',
        ];
    }
}
