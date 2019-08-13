<?php

namespace Sislab\Http\Controllers;

use Sislab\{Employee, Sample, Work, WorkOrder};

use Illuminate\Http\{Request, Response};

use Exception;

class WorkOrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $workOrders = (new WorkOrder)->getWorkOrders();

    return view('work_orders.index', [
      'workOrders' => $workOrders
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $works = (new Work)->getWorks();

    $employees = (new Employee)->getEmployees();

    return view('work_orders.create', [
      'works' => $works,
      'employees' => $employees
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
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
   * @param int $id
   * @return void
   */
  public function show(int $id)
  {
    $workOrder = (new WorkOrder)->showWorkOrder($id);

    $samples = (new Sample)->showWorkOrderSamples($id);

    return view('workOrders.show', [
      'workOrder' => $workOrder,
      'samples' => $samples
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit(int $id)
  {
    $workOrder = (new WorkOrder)->showWorkOrder($id);

    $works = (new Work)->getWorks();

    $employees = (new Employee)->getEmployees();

    return view('work_orders.edit', [
      'workOrder' => $workOrder,
      'works' => $works,
      'employees' => $employees
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param WorkOrder $workOrder
   * @return void
   */
  public function update(Request $request, WorkOrder $workOrder)
  {
    $request->validate([
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

    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param WorkOrder $workOrder
   * @return Response
   * @throws Exception
   */
  public function destroy(WorkOrder $workOrder)
  {
    $workOrder->delete();

    return redirect('/work_orders')->with('status', 'Registro eliminado exitosamente');
  }
}
