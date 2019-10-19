<?php

namespace App\Http\Controllers;

use App\{Client, ExtendedClient, ExtendedWork};
use App\Http\Requests\ClientFormRequest;
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
   * @param Int $id
   * @return Response
   */
  public function show(Int $id)
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
   * @param Int $id
   * @return Response
   */
  public function edit(Int $id)
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
   * @param Int $id
   * @return Response
   */
  public function update(ClientFormRequest $request, Int $id)
  {
    $request->validated();
    $client = Client::findOrFail($id);

    (new Client)->saveClient($request, $client);
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
    Client::findOrFail($id)->delete();
    return redirect('/clients')->with('status', 'Registro eliminado exitosamente');
  }
}
