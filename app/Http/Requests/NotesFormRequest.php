<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesFormRequest extends FormRequest
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
            'excerpt' => 'required',
            'content' => 'required'
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'excerpt.required' => 'El resumen de la nota es obligatorio',
            'content.required' => 'El contenido de la nota es obligatorio'
        ];
    }
}
