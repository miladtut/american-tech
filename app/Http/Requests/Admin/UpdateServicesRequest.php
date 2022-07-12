<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicesRequest extends FormRequest
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
            'title'  => 'required',        
            'title_en'  => 'required',        
            'desciption'  => 'required',
            'desciption_en'  => 'required',     
            'file_main'  => 'mimes:jpeg,png,jpg|max:2048',
            'file_thumbnail'  => 'mimes:jpeg,png,jpg|max:2048', 
            'alt' => 'max:255',
            'alt_en' => 'max:255',
           
            'alt_file_thumbnail' => 'max:255',
            'alt_file_thumbnail_en' => 'max:255',
           

            
        ];
    }
}
