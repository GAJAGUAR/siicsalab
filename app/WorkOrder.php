<?php

namespace Sislab;

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

  public function isValid(Request $request)
  {
    $request->validate([
      'id' => 'required|integer',
      'work_id' => 'required|integer',
      'employee_id' => 'required|integer',
      'work_order_date' => 'required|date|before:tomorrow'
    ]);
  }

  public function getWorkOrders()
  {
    return $this
      ->select('work_orders.id', 'work_order_date', 'work_nickname', 'employee_nickname', DB::raw('count(samples.id) as samples'))
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('employees', 'employees.id', '=', 'work_orders.employee_id')
      ->join('samples', 'samples.work_order_id', '=', 'work_orders.id')
      ->groupBy('work_orders.id')
      ->get();
  }

  public function showWorkOrder(int $id)
  {
    return $this
      ->select('work_orders.id', 'work_order_date', 'client_name', 'employee_name', 'work_name', 'work_location')
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->where('work_orders.id', $id)
      ->first();
  }

  public function showWorkWorkOrders(int $id)
  {
    return $this
      ->select('work_orders.id', 'work_order_date', 'employee_name', DB::raw('count(samples.id) as samples'))
      ->join('employees', 'employees.id', '=', 'work_orders.employee_id')
      ->join('samples', 'samples.work_order_id', '=', 'work_orders.id')
      ->where('work_id', $id)
      ->groupBy('work_orders.id')
      ->get();
  }

  public function saveWorkOrder(Request $request, WorkOrder $workOrder)
  {
    $workOrder->id = $request->get('id');

    $workOrder->work_id = $request->get('work_id');

    $workOrder->employee_id = $request->get('employee_id');

    $workOrder->work_order_date = $request->get('work_order_date');

    $workOrder->save();
  }

  public function deleteWorkOrder(int $id)
  {
    $this
      ->find($id)
      ->delete();
  }
}
