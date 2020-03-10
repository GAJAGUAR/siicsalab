<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompactionMold extends Model
{
  public function list()
  {
    return $this
      ->select(
        'id',
        'compaction_mold_name',
        'compaction_mold_mass',
        'compaction_mold_volume'
      )
      ->get();
  }
}
