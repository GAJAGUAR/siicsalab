<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
      'scholarship_id' => 'nullable|integer|min:1',
      'position_id' => 'nullable|integer|min:1',
      'employee_nickname' => 'required|min:3|max:50',
      'employee_title' => 'nullable|max:5',
      'first_name_1' => 'required|max:15',
      'first_name_2' => 'nullable|max:15',
      'last_name_1' => 'required|max:15',
      'last_name_2' => 'nullable|max:15',
      'employee_birthdate' => 'nullable|date',
      'employee_gender' => 'nullable|min:0|max:1'
    ];
  }
}
