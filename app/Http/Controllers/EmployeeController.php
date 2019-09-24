<?php

namespace Sislab\Http\Controllers;

use Sislab\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
   * @param Employee $employee
   * @return void
   */
  public function show(Employee $employee)
  {
    //
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
