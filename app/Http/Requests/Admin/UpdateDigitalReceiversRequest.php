<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDigitalReceiversRequest extends FormRequest
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
            'title_ar'  => 'required',
            'title_en'  => 'required',
            'description_ar'  => 'required',
            'description_en'  => 'required',
            'file' => 'mimes:jpeg,png,jpg|max:2048',
            'alt' => 'max:255',
            'alt_en' => 'max:255',
           

        ];
    }
}
