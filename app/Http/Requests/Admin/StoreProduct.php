<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProduct extends FormRequest
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
                    'product_name_en' => 'required|max:255|unique:products',
                    'product_name_ar' => 'required|max:255|unique:products',
                    'category_id' => 'required|exists:categories,id',
                    'sub_category_id' => 'required|exists:sub_categories,id',
                    'sub_sub_category_id' => 'required|exists:sub_sub_categories,id',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'product_name_ar' => 'required|max:255|unique:products,product_name_en,' . $this->id,
                    'product_name_ar' => 'required|max:255|unique:products,product_name_ar,' . $this->id,
                    'category_id' => 'required|exists:categories,id',
                    'sub_category_id' => 'required|exists:sub_categories,id',
                    'sub_sub_category_id' => 'required|exists:sub_sub_categories,id',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'product_name_en.required' => __('translations.Please Add Name En'),
            'product_name_en.unique' => __('translations.Please Name En is repeated'),
            'product_name_ar.required' =>  __('translations.Please Add Name Ar'),
            'product_name_ar.unique' =>  __('translations.Please Name Ar is repeated'),
        ];
    }
}
