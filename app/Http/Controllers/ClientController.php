<?php

namespace Sislab\Http\Controllers;

use Sislab\{Client, ExtendedClient, ExtendedWork};

use Sislab\Http\Requests\ClientFormRequest;

use Illuminate\Http\Response;

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
    $clients = (new ExtendedClient)->indexClient();

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
   * @param ClientFormRequest $request
   * @return Response
   */
  public function store(ClientFormRequest $request)
  {
    $request->validated();

    $client = new Client;

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
    $client = (new ExtendedClient)->showClient($id);

    $works = (new ExtendedWork)->worksByClient($id);

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
    $client = (new ExtendedClient)->showClient($id);

    return view('clients.edit', [
      'client' => $client
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param ClientFormRequest $request
   * @param int $id
   * @return Response
   */
  public function update(ClientFormRequest $request, int $id)
  {
    $request->validated();

    $client = Client::findOrFail($id);

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
    Client::findOrFail($id)->delete();

    return redirect('/clients')->with('status', 'Registro eliminado exitosamente');
  }
}
