<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SampleStatus extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function list()
  {
    return
      $this::select(
        'sample_statuses.id',
        'sample_status_name',
        DB::raw('COUNT(`samples`.`id`) AS `samples`')
      )
        ->leftJoin('samples', 'sample_statuses.id', '=', 'samples.sample_status_id')
        ->groupBy('sample_statuses.id')
        ->get();
  }

  public function selected(Int $id)
  {
    return
      $this::select('sample_status_name')
        ->where('sample_statuses.id', $id)
        ->first();
  }

  public function statusNames()
  {
    return
      $this::select(
        'id',
        'sample_status_name'
      )
        ->orderBy('id')
        ->get();
  }
}
