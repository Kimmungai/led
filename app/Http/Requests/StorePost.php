<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
          'title' => 'required|max:255',
          'featured_img' => 'nullable|mimes:jpg,jpeg,png,bmp,tiff |max:1096',
          'phoneNumber' => 'nullable|numeric|digits_between:10,15',
          'post_category' => 'nullable|max:255',
          'content' => 'required',
          'excerpt' => 'nullable',
        ];
    }
}
