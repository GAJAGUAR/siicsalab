<?php

namespace Sislab\Http\Controllers;

use Sislab\
{
  Bank,
  Priority,
  Purpose,
  RoadBody,
  RoadName,
  RoadSide,
  Sample,
  SampleDescription,
  SampleLocation,
  SampleTest,
  SampleTreatment,
  Status,
  ExtendedSample,
  ExtendedWorkOrder,
  Weather
};

use Illuminate\Http\
{
  Request,
  Response
};

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
    $samples = (new ExtendedSample)->get();

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
    $workOrders = (new ExtendedWorkOrder)->get();

    $banks = (new Bank)->get();

    $purposes = (new Purpose)->get();

    $weathers = (new Weather)->get();

    $priorities = (new Priority)->get();

    $statuses = (new Status)->get();

    $descriptions = (new SampleDescription)->get();

    $treatments = (new SampleTreatment)->get();

    $locations = (new SampleLocation)->get();

    $roadNames = (new RoadName)->get();

    $roadBodies = (new RoadBody)->get();

    $roadSides = (new RoadSide)->get();

    $tests = (new SampleTest)->get();

    return view('samples.create', [
      'workOrders' => $workOrders,
      'banks' => $banks,
      'purposes' => $purposes,
      'weathers' => $weathers,
      'priorities' => $priorities,
      'statuses' => $statuses,
      'descriptions' => $descriptions,
      'treatments' => $treatments,
      'locations' => $locations,
      'roadNames' => $roadNames,
      'roadBodies' => $roadBodies,
      'roadSides' => $roadSides,
      'tests' => $tests
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
    $sample = (new ExtendedSample)->show($id);

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
    $sample = (new Sample)->show($id);

    $workOrders = (new ExtendedWorkOrder)->get();

    $banks = (new Bank)->get();

    $purposes = (new Purpose)->get();

    $weathers = (new Weather)->get();

    $priorities = (new Priority)->get();

    $statuses = (new Status)->get();

    $descriptions = (new SampleDescription)->get();

    $treatments = (new SampleTreatment)->get();

    $locations = (new SampleLocation)->get();

    $roadNames = (new RoadName)->get();

    $roadBodies = (new RoadBody)->get();

    $roadSides = (new RoadSide)->get();

    $tests = (new SampleTest)->get();

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
      'locations' => $locations,
      'roadNames' => $roadNames,
      'roadBodies' => $roadBodies,
      'roadSides' => $roadSides,
      'tests' => $tests
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

    $sample = (new Sample)->show($id);

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
