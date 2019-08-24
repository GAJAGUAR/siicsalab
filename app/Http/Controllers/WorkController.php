<?php

namespace Sislab\Http\Controllers;

use Sislab\
{
  Work,
  ExtendedClient,
  ExtendedWork,
  ExtendedWorkOrder
};

use Illuminate\Http\
{
  Request,
  Response
};

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
    $works = (new ExtendedWork)->get();

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
    $clients = (new ExtendedClient)->get();

    return view('works.create', [
      'clients' => $clients
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
    (new Work)->isValid($request);

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
    $work = (new ExtendedWork)->show($id);

    $workOrders = (new ExtendedWorkOrder)->showWorkWorkOrders($id);

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
    $work = (new Work)->show($id);

    $clients = (new ExtendedClient)->get();

    return view('works.edit', [
      'work' => $work,
      'clients' => $clients
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
    (new Work)->isValid($request);

    $work = (new Work)->show($id);

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
    (new Work)->deleteWork($id);

    return redirect('/works')->with('status', 'Registro eliminado exitosamente');
  }
}
