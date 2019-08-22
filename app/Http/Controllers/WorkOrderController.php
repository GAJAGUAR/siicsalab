<?php

namespace Sislab\Http\Controllers;

use Sislab\{Employee, vSample, vWork, vWorkOrder, WorkOrder};

use Illuminate\Http\{Request, Response};

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
    $workOrders = (new vWorkOrder)->getWorkOrders();

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
    $works = (new vWork)->getWorks();

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
    (new WorkOrder)->isValid($request);

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
    $workOrder = (new vWorkOrder)->showWorkOrder($id);

    $samples = (new vSample)->showWorkOrderSamples($id);

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
    $workOrder = (new vWorkOrder)->showWorkOrder($id);

    $works = (new vWork)->getWorks();

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
   * @param int $id
   * @return Response
   */
  public function update(Request $request, int $id)
  {
    (new WorkOrder)->isValid($request);

    $workOrder = (new vWorkOrder)->showWorkOrder($id);

    (new WorkOrder)->saveWorkOrder($request, $workOrder);

    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param WorkOrder $workOrder
   * @return Response
   */
  public function destroy(WorkOrder $workOrder)
  {
    (new WorkOrder)->deleteWorkOrder($id);

    return redirect('/work_orders')->with('status', 'Registro eliminado exitosamente');
  }
}
