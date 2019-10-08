<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

/**
 * @property mixed id
 * @property mixed work_id
 * @property mixed employee_id
 * @property mixed work_order_date
 */
class WorkOrder extends Model
{
  public function work()
  {
    return $this->belongsTo(Work::class);
  }

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }

  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function saveWorkOrder(Request $request, WorkOrder $workOrder)
  {
    $workOrder->id = $request->get('id');
    $workOrder->work_id = $request->get('work_id');
    $workOrder->employee_id = $request->get('employee_id');
    $workOrder->work_order_date = $request->get('work_order_date');
    $workOrder->save();
  }
}
