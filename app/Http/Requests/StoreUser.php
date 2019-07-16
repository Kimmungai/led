<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if( Auth::user()->type == 1 || Auth::user()->type == 3 ) //authorize staff or admin only
        {
          return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $data = [
          'name' => 'required|max:255',
          'org_id' => 'nullable|numeric',
          'type' => 'nullable|numeric',
          'avatar' => 'nullable|max:255',
          'email' => 'nullable|email|max:255|unique:users,email,'.\Request::segment(2),
          'phoneNumber' => 'nullable|numeric|digits_between:10,15',
          'address' => 'nullable|max:255',
          'remarks' => 'nullable',
          'password' => 'nullable',
      ];

      return $data;
    }
}
