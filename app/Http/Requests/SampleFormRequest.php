<?php

namespace Sislab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleFormRequest extends FormRequest
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
      'id' => 'required|integer',
      'work_order_id' => 'required|integer',
      'bank_id' => 'nullable|integer',
      'purpose_id' => 'required|integer',
      'weather_id' => 'nullable|integer',
      'priority_id' => 'required|integer|min:1|max:3',
      'status_id' => 'required|integer|min:1|max:5',
      'sample_time' => 'required',
      'sample_description' => 'required|min:5|max:250',
      'sample_treatment' => 'nullable|min:5|max:100',
      'sample_location' => 'nullable|min:5|max:100',
      'road_name' => 'nullable|min:5|max:100',
      'road_station_start' => 'nullable|max:11',
      'road_station_end' => 'nullable|max:11',
      'road_station' => 'nullable|max:11',
      'road_body' => 'nullable|max:20',
      'road_side' => 'nullable|max:10',
      'phreatic_level' => 'nullable|max:4',
      'sampling_seq' => 'nullable|numeric|min:1',
      'env_temp' => 'nullable|numeric|min:1|max:50',
      'sample_seq' => 'nullable|numeric|min:1',
      'sample_tests' => 'nullable|max:100',
      'sample_notes' => 'nullable|max:500',
      'sample_receipt_date' => 'required|date|before:tomorrow',
      'sketch_file' => 'nullable|url|max:50',
      'stratigraphic_file' => 'nullable|url|max:50'
    ];
  }
}
