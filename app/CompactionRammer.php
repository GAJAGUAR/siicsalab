<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompactionRammer extends Model
{
  public function list()
  {
    return $this
      ->select(
        'id',
        'rammer_name',
        'rammer_diameter',
        'rammer_height',
        'rammer_mass'
      )
      ->get();
  }
}
