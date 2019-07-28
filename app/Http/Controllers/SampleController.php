<?php

namespace Sislab\Http\Controllers;

use Sislab\Sample;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
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
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'id' => 'required|integer',
      'work_order_id' => 'required|integer',
      'priority_id' => 'required|integer|min:1|max:3',
      'status_id' => 'required|integer|min:1|max:5',
      'sample_time' => 'required',
      'sample_desc' => 'required|min:5|max:250',
      'sample_loc' => 'max:100',
      'road_station' => 'max:11',
      'road_body' => 'max:20',
      'road_side' => 'max:10',
      'phreatic_level' => 'max:4',
      'sampling_seq' => 'numeric|min:1',
      'env_temp' => 'numeric|min:1|max:50',
      'sample_seq' => 'numeric|min:1',
      'sample_receipt_date' => 'required|date|before:tomorrow',
      'sketch_file' => 'url|max:50',
      'stratigraphic_file' => 'url|max:50'
    ]);

    $report = new Sample();
    $report->id = $request->get('id');
    $report->work_order_id = $request->get('work_order_id');
    $report->bank_id = $request->get('bank_id');
    $report->purpose_id = $request->get('purpose_id');
    $report->weather_id = $request->get('weather_id');
    $report->priority_id = $request->get('priority_id');
    $report->status_id = $request->get('status_id');
    $report->sample_time = $request->get('sample_time');
    $report->sample_desc = $request->get('sample_desc');
    $report->sample_loc = $request->get('sample_loc');
    $report->road_station = $request->get('road_station');
    $report->road_body = $request->get('road_body');
    $report->road_side = $request->get('road_side');
    $report->phreatic_level = $request->get('phreatic_level');
    $report->sampling_seq = $request->get('sampling_seq');
    $report->env_temp = $request->get('env_temp');
    $report->sample_seq = $request->get('sample_seq');
    $report->sample_notes = $request->get('sample_notes');
    $report->sample_receipt_date = $request->get('sample_receipt_date');
    $report->sample_loc_x = $request->get('sample_loc_x');
    $report->sample_loc_y = $request->get('sample_loc_y');
    $report->sketch_file = $request->get('sketch_file');
    $report->stratigraphic_file = $request->get('stratigraphic_file');
    $report->save();

    return redirect('/samples');
  }

  /**
   * Display the specified resource.
   *
   * @param \Sislab\Sample $sample
   * @return \Illuminate\Http\Response
   */
  public function show(Sample $sample)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \Sislab\Sample $sample
   * @return \Illuminate\Http\Response
   */
  public function edit(Sample $sample)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Sislab\Sample $sample
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Sample $sample)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \Sislab\Sample $sample
   * @return \Illuminate\Http\Response
   */
  public function destroy(Sample $sample)
  {
    $sample->delete();

    return redirect('/samples');
  }
}
