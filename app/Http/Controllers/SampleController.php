<?php

namespace Sislab\Http\Controllers;

use Sislab\{Bank, ExtendedSample, ExtendedWorkOrder, Priority,
  Purpose, Sample, Status, Weather};
use Sislab\Http\Requests\SampleFormRequest;
use Illuminate\Http\Response;

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
    $samples = (new ExtendedSample)->indexSample();

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
    $workOrders = (new ExtendedWorkOrder)->workOrderIds();
    $banks = (new Bank)->bankNames();
    $purposes = (new Purpose)->purposeNames();
    $weathers = (new Weather)->weatherNames();
    $priorities = (new Priority)->priorityNames();
    $statuses = (new Status)->statusNames();
    $descriptions = (new ExtendedSample)->descriptionNames();
    $treatments = (new ExtendedSample)->treatmentNames();
    $locations = (new ExtendedSample)->locationNames();
    $roadNames = (new ExtendedSample)->roadNames();
    $roadBodies = (new ExtendedSample)->roadBodyNames();
    $roadSides = (new ExtendedSample)->roadSideNames();
    $roadStripes = (new ExtendedSample)->roadStripeNames();
    $tests = (new ExtendedSample)->testNames();

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
      'roadStripes' => $roadStripes,
      'tests' => $tests
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param SampleFormRequest $request
   * @return Response
   */
  public function store(SampleFormRequest $request)
  {
    $request->validated();
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
    $sample = (new ExtendedSample)->showSample($id);

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
    $sample = Sample::findOrFail($id);
    $workOrders = (new ExtendedWorkOrder)->workOrderIds();
    $banks = (new Bank)->bankNames();
    $purposes = (new Purpose)->purposeNames();
    $weathers = (new Weather)->weatherNames();
    $priorities = (new Priority)->priorityNames();
    $statuses = (new Status)->statusNames();
    $descriptions = (new ExtendedSample)->descriptionNames();
    $treatments = (new ExtendedSample)->treatmentNames();
    $locations = (new ExtendedSample)->locationNames();
    $roadNames = (new ExtendedSample)->roadNames();
    $roadBodies = (new ExtendedSample)->roadBodyNames();
    $roadSides = (new ExtendedSample)->roadSideNames();
    $roadStripes = (new ExtendedSample)->roadStripeNames();
    $tests = (new ExtendedSample)->testNames();

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
      'roadStripes' => $roadStripes,
      'tests' => $tests
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param SampleFormRequest $request
   * @param int $id
   * @return Response
   */
  public function update(SampleFormRequest $request, int $id)
  {
    $request->validated();
    $sample = Sample::findOrFail($id);

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
    Sample::findOrFail($id)->delete();
    return redirect('/samples')->with('status', 'Registro eliminado exitosamente');
  }
}
