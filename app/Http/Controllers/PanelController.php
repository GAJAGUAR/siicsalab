<?php

namespace App\Http\Controllers;

use App\SampleStatus;

class PanelController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $statuses = (new SampleStatus)->list();

    return view('panel.admin', [
      'statuses' => $statuses
    ]);
  }
}
