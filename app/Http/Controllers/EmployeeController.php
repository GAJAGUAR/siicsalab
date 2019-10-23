<?php

namespace App\Http\Controllers;

use App\{Employee, ExtendedEmployee, ExtendedWorkOrder, Scholarship, Position};
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
    $employees = (new ExtendedEmployee)->indexEmployee();

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
    $scholarships = (new Scholarship)->scholarshipNames();
    $positions = (new Position)->positionNames();

    return view('employees.create', [
      'scholarships' => $scholarships,
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
    $employee = (new ExtendedEmployee)->showEmployee($id);
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
    $scholarships = (new Scholarship)->scholarshipNames();
    $positions = (new Position)->positionNames();

    return view('employees.edit', [
      'employee' => $employee,
      'scholarships' => $scholarships,
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
