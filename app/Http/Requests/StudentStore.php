<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStore extends FormRequest
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
              'name'=>'required|unique:authors|max:225',
            'surname'=>'required|unique:authors|max:225',
            'class'=>'required'
            'parallel'=>'required|max:18'
        ];
    }
}
