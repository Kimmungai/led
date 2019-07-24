<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Auth;

class StoreProduct extends FormRequest
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
          'cost' => 'required|numeric',
          'salePrice' => 'nullable|numeric',
          'type' => 'nullable|numeric',
          'suppliedQuantity' => 'nullable|numeric',
          'img1' => 'nullable|max:255',
          'sku' => 'nullable|max:255|unique:products,sku,'.\Request::segment(2),
          'weight' => 'nullable|numeric',
          'height' => 'nullable|numeric',
          'color' => 'nullable|max:255',
          'description' => 'nullable',
      ];

      return $data;
    }
}
