<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreSubCategory extends FormRequest
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
                    'sub_category_name_en' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('sub_categories', 'sub_category_name_en')->where('category_id', $this->category_id)
                        ],
                    'sub_category_name_ar' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('sub_categories', 'sub_category_name_ar')->where('category_id', $this->category_id)
                        ],
                    'category_id' => 'required|exists:categories,id',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'sub_category_name_en' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('sub_categories', 'sub_category_name_en')->where('category_id', $this->category_id)->ignore($this->id)
                        ],
                    'sub_category_name_ar' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('sub_categories', 'sub_category_name_ar')->where('category_id', $this->category_id)->ignore($this->id)
                        ],
                    'category_id' => 'required|exists:categories,id',
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'sub_category_name_en.required' => __('translations.Please Add Name En'),
            'sub_category_name_en.unique' => __('translations.Please Name En is repeated'),
            'sub_category_name_ar.required' =>  __('translations.Please Add Name Ar'),
            'sub_category_name_ar.unique' =>  __('translations.Please Name Ar is repeated'),
            'category_id' => __('translations.Please choose Category'),
        ];
    }
}
