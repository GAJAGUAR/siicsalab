<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
  public function work()
  {
    return $this->belongsTo(Work::class);
  }

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }

  public function samples()
  {
    return $this->hasMany(Sample::class);
  }
}
