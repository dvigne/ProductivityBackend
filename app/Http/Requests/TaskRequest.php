<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'assigned' => 'nullable',
          'name' => 'required|string',
          'description' => 'required|string',
          'category' => 'required|string',
          'status' => [
            'required',
            Rule::in(['to-do', 'in progress', 'done'])
          ]
        ];
    }
}
