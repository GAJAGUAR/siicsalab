<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class vClient extends Model
{
  public function getClients()
  {
    return $this
      ->select('id', 'client_name')
      ->get();
  }

  public function showClient(int $id)
  {
    return $this
      ->select('id', 'client_name', 'client_nickname', 'client_register', 'client_location')
      ->where('id', $id)
      ->first();
  }
}
