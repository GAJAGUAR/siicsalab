<?php

namespace Sislab\Http\Controllers;

use sislab\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
    $clients = DB::table('clients')
      ->select('id', 'client_name')
      ->get();

    return view('clients.index', [
      'clients' => $clients
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('clients.create');
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
      'client_name' => 'required|min:5|max:150',
      'client_nickname' => 'required|min:3|max:50',
      'client_register' => 'nullable|max:25',
      'client_location' => 'nullable|max:250'
    ]);

    $report = new Client();
    $report->client_name = $request->get('client_name');
    $report->client_nickname = $request->get('client_nickname');
    $report->client_register = $request->get('client_register');
    $report->client_location = $request->get('client_location');
    $report->save();

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
    $client = DB::table('clients')
      ->select('id', 'client_nickname', 'client_name', 'client_register', 'client_location')
      ->where('id', $id)
      ->first();

    $works = DB::table('works')
      ->select('id', 'work_name')
      ->where('client_id', $id)
      ->get();

    return view('clients.show', [
      'client' => $client,
      'works' => $works
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit(int $id)
  {
    $client = DB::table('clients')
      ->select('id', 'client_name', 'client_nickname', 'client_register', 'client_location')
      ->where('id', $id)
      ->first();

    return view('clients.edit', [
      'client' => $client
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \sislab\Client $client
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Client $client)
  {
    $validatedData = $request->validate([
      'client_name' => 'required|min:5|max:150',
      'client_nickname' => 'required|min:3|max:50',
      'client_register' => 'nullable|max:25',
      'client_location' => 'nullable|max:250'
    ]);

    $client->client_name = $request->get('client_name');
    $client->client_nickname = $request->get('client_nickname');
    $client->client_register = $request->get('client_register');
    $client->client_location = $request->get('client_location');
    $client->save();

    return back()->withInput()->with('status', 'Registro actualizado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \sislab\Client $client
   * @return \Illuminate\Http\Response
   */
  public function destroy(Client $client)
  {
    $client->delete();

    return redirect('/clients')->with('status', 'Registro eliminado exitosamente');
  }
}
