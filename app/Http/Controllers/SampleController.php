<?php

namespace Sislab\Http\Controllers;

use Sislab\Sample;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Exception;

use Illuminate\Support\Facades\DB;

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
    $samples = DB::table('samples')
      ->join('work_orders', 'work_orders.id', '=', 'samples.work_order_id')
      ->join('works', 'works.id', '=', 'work_orders.work_id')
      ->join('clients', 'clients.id', '=', 'works.client_id')
      ->join('purposes', 'purposes.id', '=', 'samples.purpose_id')
      ->join('statuses', 'statuses.id', '=', 'samples.status_id')
      ->select('samples.id', 'work_order_id', 'work_nickname', 'client_nickname', 'sample_description', 'purpose_name', 'sample_receipt_date', 'status_name')
      ->get();

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
    $workOrders = DB::table('work_orders')
      ->select('id')
      ->get();

    $banks = DB::table('banks')
      ->select('id', 'bank_name')
      ->get();

    $purposes = DB::table('purposes')
      ->select('id', 'purpose_name')
      ->get();

    $weathers = DB::table('weathers')
      ->select('id', 'weather_name')
      ->get();

    $priorities = DB::table('priorities')
      ->select('id', 'priority_name')
      ->get();

    $statuses = DB::table('statuses')
      ->select('id', 'status_name')
      ->get();

    return view('samples.create', [
      'workOrders' => $workOrders,
      'banks' => $banks,
      'purposes' => $purposes,
      'weathers' => $weathers,
      'priorities' => $priorities,
      'statuses' => $statuses
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
    $request->validate([
      'id' => 'required|integer',
      'work_order_id' => 'required|integer',
      'bank_id' => 'nullable|integer',
      'purpose_id' => 'required|integer',
      'weather_id' => 'nullable|integer',
      'priority_id' => 'required|integer|min:1|max:3',
      'status_id' => 'required|integer|min:1|max:5',
      'sample_time' => 'required',
      'sample_description' => 'required|min:5|max:250',
      'sample_location' => 'nullable|min:5|max:100',
      'road_name' => 'nullable|min:5|max:100',
      'road_station_start' => 'nullable|max:11',
      'road_station_end' => 'nullable|max:11',
      'road_station' => 'nullable|max:11',
      'road_body' => 'nullable|max:20',
      'road_side' => 'nullable|max:10',
      'phreatic_level' => 'nullable|max:4',
      'sampling_seq' => 'nullable|numeric|min:1',
      'env_temp' => 'nullable|numeric|min:1|max:50',
      'sample_seq' => 'nullable|numeric|min:1',
      'sample_tests' => 'nullable|max:100',
      'sample_notes' => 'nullable|max:500',
      'sample_receipt_date' => 'required|date|before:tomorrow',
      'sketch_file' => 'nullable|url|max:50',
      'stratigraphic_file' => 'nullable|url|max:50'
    ]);

    $sample = new Sample();
    $sample->id = $request->get('id');
    $sample->work_order_id = $request->get('work_order_id');
    $sample->bank_id = $request->get('bank_id');
    $sample->purpose_id = $request->get('purpose_id');
    $sample->weather_id = $request->get('weather_id');
    $sample->priority_id = $request->get('priority_id');
    $sample->status_id = $request->get('status_id');
    $sample->sample_time = $request->get('sample_time');
    $sample->sample_description = $request->get('sample_description');
    $sample->sample_location = $request->get('sample_location');
    $sample->road_name = $request->get('road_name');
    $sample->road_station_start = $request->get('road_station_start');
    $sample->road_station_end = $request->get('road_station_end');
    $sample->road_station = $request->get('road_station');
    $sample->road_body = $request->get('road_body');
    $sample->road_side = $request->get('road_side');
    $sample->phreatic_level = $request->get('phreatic_level');
    $sample->sampling_seq = $request->get('sampling_seq');
    $sample->env_temp = $request->get('env_temp');
    $sample->sample_seq = $request->get('sample_seq');
    $sample->sample_tests = $request->get('sample_tests');;
    $sample->sample_notes = $request->get('sample_notes');
    $sample->sample_receipt_date = $request->get('sample_receipt_date');
    $sample->sample_loc_x = $request->get('sample_loc_x');
    $sample->sample_loc_y = $request->get('sample_loc_y');
    $sample->sketch_file = $request->get('sketch_file');
    $sample->stratigraphic_file = $request->get('stratigraphic_file');
    $sample->save();

    return back()->withInput()->with('status', 'Registro guardado exitosamente');
  }

  /**
   * Display the specified resource.
   *
   * @param Sample $sample
   * @return void
   */
  public function show(Sample $sample)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Sample $sample
   * @return void
   */
  public function edit(Sample $sample)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Sample $sample
   * @return void
   */
  public function update(Request $request, Sample $sample)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Sample $sample
   * @return Response
   * @throws Exception
   */
  public function destroy(Sample $sample)
  {
    $sample->delete();

    return redirect('/samples');
  }
}
