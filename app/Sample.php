<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
  public function workOrder()
  {
    return $this->belongsTo(WorkOrder::class);
  }

  public function bank()
  {
    return $this->belongsTo(Bank::class);
  }

  public function purpose()
  {
    return $this->belongsTo(Purpose::class);
  }

  public function weather()
  {
    return $this->belongsTo(Weather::class);
  }

  public function priority()
  {
    return $this->belongsTo(Priority::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }
}
