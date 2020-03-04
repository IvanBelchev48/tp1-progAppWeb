<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'title' => 'required|max:50',
            'release_year' => 'required|max:4',
            'length' => 'required|max:3',
            'description' => 'required',
            'rating' => 'required|max:5',
            'language_id' => 'required|max:11',
            'special_features' => 'required|max:50',
            'image' => 'required|max:40'
        ];
    }
}
