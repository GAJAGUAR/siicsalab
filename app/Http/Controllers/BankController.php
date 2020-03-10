<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BankController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return View
   */
  public function index()
  {
    $banks = (new Bank)->list();

    return view('banks.index', [
      'banks' => $banks
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return void
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return void
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param Bank $bank
   * @return void
   */
  public function show(Bank $bank)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param Bank $bank
   * @return void
   */
  public function edit(Bank $bank)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param Bank $bank
   * @return void
   */
  public function update(Request $request, Bank $bank)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param Bank $bank
   * @return void
   */
  public function destroy(Bank $bank)
  {
    //
  }
}
