<?php

namespace Sislab\Http\Controllers;

use Sislab\WorkOrder;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WorkOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $workOrders = DB::table('work_orders')
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('employees', 'employees.id', '=', 'work_orders.employee_id')
      ->select('work_orders.id', 'work_order_date', 'work_name', 'employee_nickname')
      ->get();

    return view('work_orders.index', [
      'workOrders' => $workOrders
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param \Sislab\WorkOrder $workOrder
   * @return \Illuminate\Http\Response
   */
  public function show(WorkOrder $workOrder)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \Sislab\WorkOrder $workOrder
   * @return \Illuminate\Http\Response
   */
  public function edit(WorkOrder $workOrder)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Sislab\WorkOrder $workOrder
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, WorkOrder $workOrder)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Sislab\WorkOrder $workOrder
   * @return \Illuminate\Http\Response
   */
  public function destroy(WorkOrder $workOrder)
  {
    //
  }
}
