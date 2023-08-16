<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->isMethod('post')) {
            return [
                'website_id' => 'required|integer|max:11',
                'title' => 'required|string|max:258',
                'description' => 'required|string|max:4096',
                'user_id' => 'required|integer|max:11'
            ];
        } else {
            return [
                'website_id' => 'required|integer|max:11',
                'title' => 'required|string|max:258',
                'description' => 'required|string|max:4096',
                'user_id' => 'required|integer|max:11'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'website_id.required' => 'Website id is required!',
                'title.required' => 'title is required!',
                'description.required' => 'Descritpion is required!',
                'user_id.required' => 'User id is required!'

            ];
        } else {
            return [
                'website_id.required' => 'Website id is required!',
                'title.required' => 'title is required!',
                'description.required' => 'Descritpion is required!',
                'user_id.required' => 'User id is required!'
            ];   
        }
    }
}
