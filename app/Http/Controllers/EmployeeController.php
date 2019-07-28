<?php

namespace Sislab\Http\Controllers;

use Sislab\Employee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $employees = DB::table('employees')
      ->select('id', 'employee_name')
      ->get();

    return view('employees.index', [
      'employees' => $employees
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
   * @param \Sislab\Employee $employee
   * @return \Illuminate\Http\Response
   */
  public function show(Employee $employee)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \Sislab\Employee $employee
   * @return \Illuminate\Http\Response
   */
  public function edit(Employee $employee)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Sislab\Employee $employee
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Employee $employee)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Sislab\Employee $employee
   * @return \Illuminate\Http\Response
   */
  public function destroy(Employee $employee)
  {
    //
  }
}
