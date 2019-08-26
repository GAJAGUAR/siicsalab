<?php

namespace Sislab\Http\Controllers;

use Sislab\{Work, ExtendedClient, ExtendedWork, ExtendedWorkOrder};

use Sislab\Http\Requests\WorkFormRequest;

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
   * @param int $id
   * @return Response
   */
  public function show(int $id)
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
   * @param int $id
   * @return Response
   */
  public function edit(int $id)
  {
    $work = (new ExtendedWork)->showWork($id);

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
   * @param int $id
   * @return Response
   */
  public function update(WorkFormRequest $request, int $id)
  {
    $request->validated();

    $work = Work::findOrFail($id);

    (new Work)->saveWork($request, $work);

    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy(int $id)
  {
    Work::findOrFail($id)->delete();

    return redirect('/works')->with('status', 'Registro eliminado exitosamente');
  }
}
