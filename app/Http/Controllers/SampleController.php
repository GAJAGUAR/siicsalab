<?php

namespace App\Http\Controllers;

use App\{Bank, ExtendedSample, ExtendedWorkOrder, SamplePriority,
  SamplePurpose, Sample, SampleStatus, SampleWeather};
use App\Http\Requests\SampleFormRequest;
use Illuminate\View\View;

class SampleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return View
   */
  public function index()
  {
    $samples = (new ExtendedSample)->list();

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
    $purposes = (new SamplePurpose)->purposeNames();
    $weathers = (new SampleWeather)->weatherNames();
    $priorities = (new SamplePriority)->priorityNames();
    $statuses = (new SampleStatus)->statusNames();
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
   * @param Int $id
   * @return View
   */
  public function show(Int $id)
  {
    $sample = (new ExtendedSample)->describe($id);

    return view('samples.show', [
      'sample' => $sample
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Int $id
   * @return View
   */
  public function edit(Int $id)
  {
    $sample = Sample::findOrFail($id);
    $workOrders = (new ExtendedWorkOrder)->workOrderIds();
    $banks = (new Bank)->bankNames();
    $purposes = (new SamplePurpose)->purposeNames();
    $weathers = (new SampleWeather)->weatherNames();
    $priorities = (new SamplePriority)->priorityNames();
    $statuses = (new SampleStatus)->statusNames();
    $descriptions = (new ExtendedSample)->descriptionNames();
    $treatments = (new ExtendedSample)->treatmentNames();
    $locations = (new ExtendedSample)->locationNames();
    $roadNames = (new ExtendedSample)->roadNames();
    $roadBodies = (new ExtendedSample)->roadBodyNames();
    $roadSides = (new ExtendedSample)->roadSideNames();
    $roadStripes = (new ExtendedSample)->roadStripeNames();
    $tests = (new ExtendedSample)->testNames();
    $clientId = (new ExtendedSample)->describe($id)->client_id;
    $workId = (new ExtendedSample)->describe($id)->work_id;

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
      'tests' => $tests,
      'clientId' => $clientId,
      'workId' => $workId
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param SampleFormRequest $request
   * @param Int $id
   * @return Response
   */
  public function update(SampleFormRequest $request, Int $id)
  {
    $request->validated();
    $sample = Sample::findOrFail($id);

    (new Sample)->saveSample($request, $sample);

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
    Sample::findOrFail($id)->delete();

    return redirect('/samples')->with('status', 'Registro eliminado exitosamente');
  }
}
