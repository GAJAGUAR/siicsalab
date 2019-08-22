<?php

namespace Sislab\Http\Controllers;

use Sislab\{Bank, Priority, Purpose, Sample, Status, vSample, vWorkOrder, Weather};

use Illuminate\Http\{Request, Response};

class SampleController extends Controller
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
    $samples = (new vSample)->getSamples();

    return view('samples.index', [
      'samples' => $samples
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $workOrders = (new vWorkOrder)->getWorkOrders();

    $banks = (new Bank)->getBanks();

    $purposes = (new Purpose)->getPurposes();

    $weathers = (new Weather)->getWeathers();

    $priorities = (new Priority)->getPriorities();

    $statuses = (new Status)->getStatuses();

    $descriptions = (new vSample)->getDescriptions();

    $treatments = (new vSample)->getTreatments();

    $roadNames = (new vSample)->getRoadNames();

    $roadBodies = (new vSample)->getRoadBodies();

    $roadSides = (new vSample)->getRoadSides();

    return view('samples.create', [
      'workOrders' => $workOrders,
      'banks' => $banks,
      'purposes' => $purposes,
      'weathers' => $weathers,
      'priorities' => $priorities,
      'statuses' => $statuses,
      'descriptions' => $descriptions,
      'treatments' => $treatments,
      'roadNames' => $roadNames,
      'roadBodies' => $roadBodies,
      'roadSides' => $roadSides
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
    (new Sample)->isValid($request);

    $sample = new Sample();

    (new Sample)->saveSample($request, $sample);

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
    $sample = (new vSample)->showSample($id);

    return view('samples.show', [
      'sample' => $sample
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
    $sample = (new vSample)->showSample($id);

    $workOrders = (new vWorkOrder)->getWorkOrders();

    $banks = (new Bank)->getBanks();

    $purposes = (new Purpose)->getPurposes();

    $weathers = (new Weather)->getWeathers();

    $priorities = (new Priority)->getPriorities();

    $statuses = (new Status)->getStatuses();

    $descriptions = (new vSample)->getDescriptions();

    $treatments = (new vSample)->getTreatments();

    $roadNames = (new vSample)->getRoadNames();

    $roadBodies = (new vSample)->getRoadBodies();

    $roadSides = (new vSample)->getRoadSides();

    return view('samples.edit', [
      'sample' => $sample,
      'workOrders' => $workOrders,
      'banks' => $banks,
      'purposes' => $purposes,
      'weathers' => $weathers,
      'priorities' => $priorities,
      'statuses' => $statuses,
      'descriptions' => $descriptions,
      'treatments' => $treatments,
      'roadNames' => $roadNames,
      'roadBodies' => $roadBodies,
      'roadSides' => $roadSides
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
    (new Sample)->isValid($request);

    $sample = (new vSample)->showSample($id);

    (new Sample)->saveSample($request, $sample);

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
    (new Sample)->deleteSample($id);

    return redirect('/samples')->with('status', 'Registro eliminado exitosamente');
  }
}
