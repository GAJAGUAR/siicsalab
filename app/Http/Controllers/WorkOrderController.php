<?php

namespace App\Http\Controllers;

use App\{ExtendedEmployee, ExtendedSample, ExtendedWork,
  ExtendedWorkOrder, WorkOrder};
use App\Http\Requests\WorkOrderFormRequest;
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
    $employees = (new ExtendedEmployee)->list();

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
   * @param Int $id
   * @return Response
   */
  public function show(Int $id)
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
   * @param Int $id
   * @return Response
   */
  public function edit(Int $id)
  {
    $workOrder = WorkOrder::findOrFail($id);
    $works = (new ExtendedWork)->workNames();
    $employees = (new Employee)->employeeNames();
    $clientId = (new ExtendedWorkOrder)->showWorkOrder($id)->client_id;

    return view('work_orders.edit', [
      'workOrder' => $workOrder,
      'works' => $works,
      'employees' => $employees,
      'clientId' => $clientId
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param WorkOrderFormRequest $request
   * @param Int $id
   * @return Response
   */
  public function update(WorkOrderFormRequest $request, Int $id)
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
