<?php

namespace Sislab\Http\Controllers;

use Sislab\Work;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $works = DB::table('works')
      ->select('id', 'work_name')
      ->get();

    return view('works.index', [
      'works' => $works
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $clients = DB::table('clients')
      ->select('id', 'client_name')
      ->get();

    return view('works.create', [
      'clients' => $clients
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
      'client_id' => 'required',
      'work_name' => 'required|min:5|max:750',
      'work_nickname' => 'required|min:3|max:50',
      'work_location' => 'required|min:5|max:250'
    ]);

    $work = new Work();

    $work->client_id = $request->get('client_id');

    $work->work_name = $request->get('work_name');

    $work->work_nickname = $request->get('work_nickname');

    $work->work_location = $request->get('work_location');

    $work->save();

    return back()->withInput()->with('status', 'Registro guardado exitosamente');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $work = DB::table('works')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->select('work_nickname', 'client_name', 'work_name', 'work_location')
      ->where('works.id', $id)
      ->first();

    $workOrders = DB::table('work_orders')
      ->join('employees', 'employees.id', '=', 'work_orders.employee_id')
      ->select('work_orders.id', 'employee_name', 'work_order_date')
      ->where('work_id', $id)
      ->orderBy('work_orders.id', 'ASC')
      ->get();

    return view('works.show', [
      'work_id' => $id,
      'work' => $work,
      'workOrders' => $workOrders
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $work = DB::table('works')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->select('works.id', 'client_id', 'client_name', 'work_name', 'work_nickname', 'work_location')
      ->where('works.id', $id)
      ->first();

    return view('works.edit', [
      'work' => $work
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Sislab\Work $work
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Work $work)
  {
    $validatedData = $request->validate([
      'client_id' => 'required',
      'work_name' => 'required|min:5|max:750',
      'work_nickname' => 'required|min:5|max:50',
      'work_location' => 'required|min:5|max:250'
    ]);

    $work->client_id = $request->get('client_id');

    $work->work_name = $request->get('work_name');

    $work->work_nickname = $request->get('work_nickname');

    $work->work_location = $request->get('work_location');

    $work->save();

    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Sislab\Work $work
   * @return \Illuminate\Http\Response
   */
  public function destroy(Work $work)
  {
    $work->delete();

    return redirect('/works')->with('status', 'Registro eliminado exitosamente');
  }
}
