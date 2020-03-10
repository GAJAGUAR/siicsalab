<?php

namespace App\Http\Controllers;

use App\{Employee, ExtendedEmployee, ExtendedWorkOrder, Schooling, Position};
use App\Http\Requests\EmployeeFormRequest;
use Illuminate\Http\Response;

class EmployeeController extends Controller
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
    $employees = (new ExtendedEmployee)->list();

    return view('employees.index', [
      'employees' => $employees
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $schoolings = (new Schooling)->list();
    $positions = (new Position)->list();

    return view('employees.create', [
      'schoolings' => $schoolings,
      'positions' => $positions
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param EmployeeFormRequest $request
   * @return Response
   */
  public function store(EmployeeFormRequest $request)
  {
    $request->validated();
    $employee = new Employee();

    (new Employee)->saveEmployee($request, $employee);
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
    $employee = (new ExtendedEmployee)->describe($id);
    $workOrders = (new ExtendedWorkOrder)->workOrdersByEmployee($id);

    return view('employees.show', [
      'employee' => $employee,
      'workOrders' => $workOrders
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
    $employee = Employee::findOrFail($id);
    $schoolings = (new Schooling)->list();
    $positions = (new Position)->list();

    return view('employees.edit', [
      'employee' => $employee,
      'schoolings' => $schoolings,
      'positions' => $positions
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param EmployeeFormRequest $request
   * @param Int $id
   * @return Response
   */
  public function update(EmployeeFormRequest $request, Int $id)
  {
    $request->validated();
    $employee = Employee::findOrFail($id);

    (new Employee)->saveEmployee($request, $employee);
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
    Employee::findOrFail($id)->delete();
    return redirect('/works')->with('status', 'Registro eliminado exitosamente');
  }
}
