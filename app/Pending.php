<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Pending extends Model
{
  protected $table = 'extended_samples';

  public function indexPending()
  {
    return $this
    ->select(
      'id',
      'work_order_id',
      'work_order_date',
      'sample_purpose_name',
      'sample_description')
    ->where('sample_status_name', 'PENDIENTE')
    ->orWhere('sample_status_name', 'EN PROCESO')
    ->orWhere('sample_status_name', 'FINALIZADO')
    ->orWhere('sample_status_name', 'CANCELADO')
    ->get();
  }
}
