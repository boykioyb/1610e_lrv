<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class PostFormRequest extends FormRequest
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
            'title' => [
                "required",
                Rule::unique('posts')->ignore($this->get('id'))
            ],
            'slug' => [ 
                'required', 
                Rule::unique("slugs")->ignore($this->get('id'), 'entity_id')->where(function ($query) {
                      $query->where('entity_type', ENTITY_POST);
                })
            ],
            'short_description' => 'required|max:200',
            'content' => 'required',
            'feature_image' => 'image'
        ];
    }

    public function messages(){
        return [
            'title.required' => "Title is required!",
            'title.unique' => "Title should be unique!",
            'short_description.required' => 'Short descript is required!',
            'short_description.max' => 'Short description should be less than 200 characters!',
            'content.required' => 'Content is required!',

        ];
    }
}
