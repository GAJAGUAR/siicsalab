<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class ExtendedClient extends Model
{
  public function get()
  {
    return $this
      ->select(
        'id',
        'client_name')
      ->get();
  }

  public function show(int $id)
  {
    return $this
      ->select(
        'id',
        'client_name',
        'client_nickname',
        'client_register',
        'client_location')
      ->where('id', $id)
      ->first();
  }
}
