<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'meta_title'=>'required',
            'meta_title_en'=>'required',
            'meta_desc'=>'required',
            'meta_desc_en'=>'required',
            'key_words'=>'required',
            'tags'=>'required',
            'copyright'=>'required',
            'copyright_en'=>'required',
            'hourwork'=>'required',
            'hourwork_en'=>'required',
            'email' => 'email',
        ];
    }
}
