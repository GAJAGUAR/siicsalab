<?php

namespace Sislab;

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

  public function getBanks()
  {
    return $this
      ->select('id', 'bank_name')
      ->get();
  }

  public function showBank(int $id)
  {
    //
  }

  public function saveBank(Request $request, Bank $bank)
  {
    //
  }

  public function deleteBank(int $id)
  {
    //
  }
}
