<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicCompactionRammer extends Model
{
  public function list()
  {
    return $this
      ->select(
        'id',
        'dynamic_compaction_rammer_name',
        'dynamic_compaction_rammer_diameter',
        'dynamic_compaction_rammer_height',
        'dynamic_compaction_rammer_mass'
      )
      ->get();
  }
}
