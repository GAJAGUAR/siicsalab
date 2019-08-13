<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }
}
