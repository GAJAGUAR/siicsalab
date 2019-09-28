<?php

namespace Sislab\Http\Controllers;

use Sislab\{Employee, ExtendedSample, ExtendedWork, ExtendedWorkOrder, WorkOrder};
use Sislab\Http\Requests\WorkOrderFormRequest;
use Illuminate\Http\Response;

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
    $workOrders = (new ExtendedWorkOrder)->indexWorkOrder();

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
    $works = (new ExtendedWork)->workNames();
    $employees = (new Employee)->employeeNames();

    return view('work_orders.create', [
      'works' => $works,
      'employees' => $employees
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param WorkOrderFormRequest $request
   * @return Response
   */
  public function store(WorkOrderFormRequest $request)
  {
    $request->validated();
    $workOrder = new WorkOrder();

    (new WorkOrder)->saveWorkOrder($request, $workOrder);
    return back()->withInput()->with('status', 'Registro guardado exitosamente');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show(int $id)
  {
    $workOrder = (new ExtendedWorkOrder)->showWorkOrder($id);
    $samples = (new ExtendedSample)->samplesByWorkOrder($id);

    return view('work_orders.show', [
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
    $workOrder = WorkOrder::findOrFail($id);
    $works = (new ExtendedWork)->workNames();
    $employees = (new Employee)->employeeNames();

    return view('work_orders.edit', [
      'workOrder' => $workOrder,
      'works' => $works,
      'employees' => $employees
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param WorkOrderFormRequest $request
   * @param int $id
   * @return Response
   */
  public function update(WorkOrderFormRequest $request, int $id)
  {
    $request->validated();
    $workOrder = WorkOrder::findOrFail($id);

    (new WorkOrder)->saveWorkOrder($request, $workOrder);
    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Int $id
   * @return Response
   */
  public function destroy(Int $id)
  {
    WorkOrder::findOrFail($id)->delete();
    return redirect('/work_orders')->with('status', 'Registro eliminado exitosamente');
  }
}
