<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
            'poster' => ['required'],
            'name' => ['required', 'string'],
            'story' => ['required', 'string'],

            'trailer' => ['required', 'string'],
            'sort' => ['sometimes', 'string'],
            'video' => ['required'],
            'year' => ['required'],
            'categories' => ['required', 'array'],
        ];
    }
}
