<?php

namespace Package\BlogCategory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
            'name'=>'required|unique:blog_categories,name,NULL,parent_name',
            'visibility'=>'required|integer|not_in:0|in:1,2'
        ];
    }

}
