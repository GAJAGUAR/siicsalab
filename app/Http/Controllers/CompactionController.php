<?php

namespace App\Http\Controllers;

use App\DynamicCompaction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompactionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return View
   */
  public function index()
  {
    return view('compactions.index', [
      //
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('compactions.create', [
      //
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  Int $id
   * @return View
   */
  public function show(Int $id)
  {
    return view('compactions.show', [
      //
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Int $id
   * @return View
   */
  public function edit(Int $id)
  {
    return view('compactions.edit', [
      //
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  DynamicCompaction  $dynamicCompaction
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, DynamicCompaction $dynamicCompaction)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  DynamicCompaction  $dynamicCompaction
   * @return \Illuminate\Http\Response
   */
  public function destroy(DynamicCompaction $dynamicCompaction)
  {
    //
  }
}
