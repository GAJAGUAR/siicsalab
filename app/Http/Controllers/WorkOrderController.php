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
    $works = DB::table('works')
      ->select('id', 'work_name')
      ->get();

    $employees = DB::table('employees')
      ->select('id', 'employee_name')
      ->get();

    return view('work_orders.create', [
      'works' => $works,
      'employees' => $employees
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'id' => 'required|integer',
      'work_id' => 'required|integer',
      'employee_id' => 'required|integer',
      'work_order_date' => 'required|date|before:tomorrow'
    ]);

    $workOrder = new WorkOrder();
    $workOrder->id = $request->get('id');
    $workOrder->work_id = $request->get('work_id');
    $workOrder->employee_id = $request->get('employee_id');
    $workOrder->work_order_date = $request->get('work_order_date');
    $workOrder->save();

    return back()->withInput()->with('status', 'Registro guardado exitosamente');
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
