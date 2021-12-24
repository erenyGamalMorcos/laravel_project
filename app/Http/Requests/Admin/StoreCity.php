<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCity extends FormRequest
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
                    'name_en' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('cities', 'name_en')->where('country_id', $this->country_id)
                        ],
                    'name_ar' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('cities', 'name_ar')->where('country_id', $this->country_id)
                        ],
                    'country_id' => 'required',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name_en' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('cities', 'name_en')->where('country_id', $this->country_id)->ignore($this->id)
                        ],
                    'name_ar' =>
                        [
                            'required',
                            'max:255',
                            Rule::unique('cities', 'name_ar')->where('country_id', $this->country_id)->ignore($this->id)
                        ],
                    'country_id' => 'required',
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
            'country_id' => __('translations.Please choose Country'),
        ];
    }
}
