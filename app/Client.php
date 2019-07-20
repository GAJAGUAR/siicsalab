<?php

namespace sislab;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  public function works()
  {
    return $this->hasMany(Work::class);
  }
}
