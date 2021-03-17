<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'title' => 'required|min:3',
            'releaseDate' => 'required',
            'endDate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo ":attribute" é obrigatório',
            'title.required' => 'O campo Título deve ser preenchido!',
            'title.min' => 'O campo Título deve conter pelo menos 3 caracteres.',
            'releaseDate.required' => 'A Data de Lançamento deve ser informada!',
        ];
    }
}
