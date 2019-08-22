<?php

namespace Sislab\Http\Controllers;

use Sislab\{Work, vClient, vWork, vWorkOrder};

use Illuminate\Http\{Request, Response};

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
    $works = (new vWork)->getWorks();

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
    $clients = (new vClient)->getClients();

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
    $work = (new vWork)->showWork($id);

    $workOrders = (new vWorkOrder)->showWorkWorkOrders($id);

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
    $work = (new vWork)->showWork($id);

    $clients = (new vClient)->getClients();

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

    $work = (new vWork)->showWork($id);

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
