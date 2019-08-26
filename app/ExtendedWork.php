<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class ExtendedWork extends Model
{
  public function extendedClient()
  {
    return $this->belongsTo(ExtendedClient::class);
  }

  public function worksByClient(int $id)
  {
    return $this
      ->select(
        'id',
        'work_name',
        'work_orders')
      ->where('client_id', $id)
      ->get();
  }
}
