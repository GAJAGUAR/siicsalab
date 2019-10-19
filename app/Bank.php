<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Bank extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function isValid(Request $request)
  {
    //
  }

  public function indexBank()
  {
    return $this
      ->select(
        'id',
        'bank_name',
        'bank_location')
      ->get();
  }

  public function showBank(Int $id)
  {
    //
  }

  public function saveBank(Request $request, Bank $bank)
  {
    //
  }

  public function bankNames()
  {
    return $this
      ->select(
        'id',
        'bank_name')
      ->get();
  }
}
