<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCountry extends FormRequest
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
                    'name_en' => 'required|max:255|unique:countries',
                    'name_ar' => 'required|max:255|unique:countries',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name_en' => 'required|max:255|unique:countries,name_en,' . $this->id,
                    'name_ar' => 'required|max:255|unique:countries,name_ar,' . $this->id,
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name_en.required' => __('translations.Please Add Name En'),
            'name_en.unique' => __('translations.Please Name En is repeated'),
            'name_ar.required' =>  __('translations.Please Add Name Ar'),
            'name_ar.unique' =>  __('translations.Please Name Ar is repeated'),
        ];
    }
}
