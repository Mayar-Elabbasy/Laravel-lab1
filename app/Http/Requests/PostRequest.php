<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3|unique:posts,title,'.$this->post,
            'description' => 'required|min:10',
            'posted_by' => 'required|exists:users,id',
            
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'The Title has minimum of 3 chars',
            'title.required' => 'Title is required, you have to fill it!',
            'title.unique' => 'Title is unique, you have to choose a different title!',
            'description.min' => 'The Description has minimum of 10 chars',
            'description.required' => 'Description is required, you have to fill it!',
            'posted_by.exists'=> 'This Post Creator doesn\'t exist in the database!!!!', 
        ];
    }
    
}
