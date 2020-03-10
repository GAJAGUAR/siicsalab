<?php

namespace App\Http\Controllers;

use App\ExtendedSample;
use App\SampleStatus;

class StatusController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param Int $id
   * @return Response
   */
  public function index(Int $id)
  {
    $status = (new SampleStatus)->selected($id);
    $samples = (new ExtendedSample)->samplesByStatus($id);

    return view('statuses.index', [
      'status' => $status,
      'samples' => $samples
    ]);
  }
}
