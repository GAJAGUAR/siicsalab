<?php

namespace Sislab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkFormRequest extends FormRequest
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
      'client_id' => 'required',
      'work_name' => 'required|min:5|max:750',
      'work_nickname' => 'required|min:3|max:50',
      'work_location' => 'required|min:5|max:250'
    ];
  }
}
