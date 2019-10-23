<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property mixed id
 * @property mixed scholarship_id
 * @property mixed position_id
 * @property mixed employee_nickname
 * @property mixed employee_title
 * @property mixed first_name_1
 * @property mixed first_name_2
 * @property mixed last_name_1
 * @property mixed last_name_2
 * @property mixed employee_name
 * @property mixed employee_birthdate
 * @property mixed employee_gender
 * @method static findOrFail(Int $id)
 */

class Employee extends Model
{
  public function scholarship()
  {
    return $this->belongsTo(Scholarship::class);
  }

  public function position()
  {
    return $this->belongsTo(Position::class);
  }

  public function workOrders()
  {
    return $this->hasMany(WorkOrder::class);
  }

  public function indexEmployee()
  {
    return $this
      ->select('id', 'employee_name')
      ->get();
  }

  public function employeeNames()
  {
    return $this
      ->select(
        'id',
        'employee_name')
      ->get();
  }

  public function saveEmployee(Request $request, Employee $employee)
  {
    $employee->scholarship_id = $request->get('scholarship_id');
    $employee->position_id = $request->get('position_id');
    $employee->employee_nickname = $request->get('employee_nickname');
    $employee->employee_title = $request->get('employee_title');
    $employee->first_name_1 = $request->get('first_name_1');
    $employee->first_name_2 = $request->get('first_name_2');
    $employee->last_name_1 = $request->get('last_name_1');
    $employee->last_name_2 = $request->get('last_name_2');
    $employee->employee_birthdate = $request->get('employee_birthdate');
    $employee->employee_gender = $request->get('employee_gender');
    $employee->save();
  }
}
