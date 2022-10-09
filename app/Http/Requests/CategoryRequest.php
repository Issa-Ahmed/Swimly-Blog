<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'title'=>'required|max:50|unique:categories',
                'slug'=>'required|max:50|same:title'
            ];
        }
        if(request()->isMethod('PUT') || request()->isMethod('PATCH') )
        {
            return [
                'title' => 'required|max:50',
                'slug' => 'required|max:50|same:title'
            ];
        }
    }
}
