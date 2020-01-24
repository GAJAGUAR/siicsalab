<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicCompactionMold extends Model
{
  public function list()
  {
    return $this
      ->select(
        'id',
        'dynamic_compaction_mold_name',
        'dynamic_compaction_mold_mass',
        'dynamic_compaction_mold_volume'
      )
      ->get();
  }
}
