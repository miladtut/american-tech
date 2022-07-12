<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'tags_ar'  => 'required',
            'tags_en'  => 'required',
            'department_id' => 'required|exists:system_constants,id',
            'filename.*' => 'mimes:jpeg,png,jpg|max:2048',
            'alt.*' => 'max:255',
            'alt_en.*' => 'max:255',
            'altedit.*' => 'max:255',
            'altedit_en.*' => 'max:255',


        ];
    }
}
