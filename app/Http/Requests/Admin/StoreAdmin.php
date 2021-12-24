<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAdmin extends FormRequest
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
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:admins',
                    'password' => 'required|min:6',
                    'phone' => 'required|numeric',
                    'country_id' => 'required',
                    'city_id' => 'required',
                    'image' => 'image|mimes:jpeg,jpg,png'
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'name' => 'required|max:255|unique:admins,name,'.$this->id,
                    'email' => 'required|max:255',
                    'country_id' => 'required',
                    'city_id' => 'required',
                    'image' => 'image|mimes:jpeg,jpg,png'
                ];
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('translations.Please Add Name'),
            'email.required' => __('translations.Please Add Email'),
            'country_id.required' =>  __('translations.Please Add Country Name'),
            'city_id.required' =>  __('translations.Please City Name'),
        ];
    }
}
