<?php

namespace App\Http\Controllers;

use App\Pending;

class PendingController extends Controller
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
    $samples = (new Pending)->indexPending();

    return view('pendings.index', [
      'samples' => $samples
    ]);
  }
}
