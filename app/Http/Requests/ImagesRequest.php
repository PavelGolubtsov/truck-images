<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'picture' => 'required|mimes:jpg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не выбрано :attribute',
            'mimes' => 'Это :attribute должно иметь тип файла: :values',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'description' => 'описание',
            'picture' => 'изображение',
        ];
    }
}
