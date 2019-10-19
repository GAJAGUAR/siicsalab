<?php

namespace App\Http\Controllers;

use App\{Work, ExtendedClient, ExtendedWork, ExtendedWorkOrder};
use App\Http\Requests\WorkFormRequest;
use Illuminate\Http\Response;

class WorkController extends Controller
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
    $works = (new ExtendedWork)->indexWork();

    return view('works.index', [
      'works' => $works
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $clients = (new ExtendedClient)->clientNames();

    return view('works.create', [
      'clients' => $clients
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param WorkFormRequest $request
   * @return Response
   */
  public function store(WorkFormRequest $request)
  {
    $request->validated();
    $work = new Work();

    (new Work)->saveWork($request, $work);
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
    $work = (new ExtendedWork)->showWork($id);
    $workOrders = (new ExtendedWorkOrder)->workOrdersByWork($id);

    return view('works.show', [
      'work' => $work,
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
    $work = Work::findOrFail($id);
    $clients = (new ExtendedClient)->clientNames();

    return view('works.edit', [
      'work' => $work,
      'clients' => $clients
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param WorkFormRequest $request
   * @param Int $id
   * @return Response
   */
  public function update(WorkFormRequest $request, Int $id)
  {
    $request->validated();
    $work = Work::findOrFail($id);

    (new Work)->saveWork($request, $work);
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
    Work::findOrFail($id)->delete();
    return redirect('/works')->with('status', 'Registro eliminado exitosamente');
  }
}
