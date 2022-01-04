<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'category_name_en' => 'required|max:255|unique:categories',
                    'category_name_ar' => 'required|max:255|unique:categories',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'category_name_en' => 'required|max:255|unique:categories,category_name_en,' . $this->id,
                    'category_name_ar' => 'required|max:255|unique:categories,category_name_ar,' . $this->id,
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'category_name_en.required' => __('translations.Please Add Name En'),
            'category_name_en.unique' => __('translations.Please Name En is repeated'),
            'category_name_ar.required' =>  __('translations.Please Add Name Ar'),
            'category_name_ar.unique' =>  __('translations.Please Name Ar is repeated'),
        ];
    }
}
