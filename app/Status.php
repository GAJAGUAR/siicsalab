<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function getStatuses()
  {
    return $this->select('id', 'status_name')
      ->get();
  }
}
