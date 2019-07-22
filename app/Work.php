<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function workOrders()
  {
    return $this->hasMany(WorkOrder::class);
  }
}
