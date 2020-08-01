<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestNotepad extends FormRequest
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
            'np_name'            =>'required|max:190|unique:notepads,np_name,'.$this->id,
            'np_description'     => 'required'.$this->id,

        ];
    }
    public function messages()
    {
        return [
            'np_name.required'         => 'Dữ liệu không được để trống',
            'np_name.max'              => 'Không được nhập quá 190 ký tự',
            'np_name.unique'           => 'Dữ liệu đã tồn tại',
            'np_description.required'  => 'Dữ liệu không được để trống',


        ];
    }
}
