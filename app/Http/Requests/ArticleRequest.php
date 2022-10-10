<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        if(request()->isMethod('POST'))
        {

            return [
                'title'=>'required|unique:articles|max:100',
                'image'=>'required|image|max:1024',
                'post'=>'required|min:200', 
                'category_id'=>'required'
            ];
        }

        if(request()->isMethod('PUT'))
        {
    
        return [
            'title' => 'required|max:100',
            'image' => 'image|max:1024',
            'post' => 'required|min:200',
            'category_id' => 'required'
        ];

        }
            
    }
    
}
