<?php

namespace Sislab\Http\Controllers;

use Sislab\{Client, Work};

use Illuminate\Http\{Request, Response};

class ClientController extends Controller
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
    $clients = (new Client)->getClients();

    return view('clients.index', [
      'clients' => $clients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('clients.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    (new Client)->isValid($request);

    $client = new Client();

    (new Client)->saveClient($request, $client);

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
    $client = (new Client)->showClient($id);

    $works = (new Work)->showClientWorks($id);

    return view('clients.show', [
      'client' => $client,
      'works' => $works
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
    $client = (new Client)->showClient($id);

    return view('clients.edit', [
      'client' => $client
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
    (new Client)->isValid($request);

    $client = (new Client)->showClient($id);

    (new Client)->saveClient($request, $client);

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
    (new Client)->deleteClient($id);

    return redirect('/clients')->with('status', 'Registro eliminado exitosamente');
  }
}
