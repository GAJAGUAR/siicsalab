<?php

namespace App\Http\Controllers;

use App\{Employee, ExtendedEmployee, ExtendedWorkOrder};
use Illuminate\Http\Request;
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
   * @return void
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return void
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show(int $id)
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
   * @param Employee $employee
   * @return void
   */
  public function edit(Employee $employee)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Employee $employee
   * @return void
   */
  public function update(Request $request, Employee $employee)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Employee $employee
   * @return void
   */
  public function destroy(Employee $employee)
  {
    //
  }
}
