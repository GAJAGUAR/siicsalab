<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
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
      'client_name' => 'required|min:5|max:150',
      'client_nickname' => 'required|min:3|max:50',
      'client_register' => 'nullable|max:25',
      'client_location' => 'nullable|max:250'
    ];
  }
}
