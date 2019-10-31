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
      'sample_purpose_name',
      'sample_description',
      'sample_receipt_date')
    ->where('sample_status_name', 'PENDIENTE')
    ->orWhere('sample_status_name', 'EN PROCESO')
    ->orWhere('sample_status_name', 'FINALIZADO')
    ->orWhere('sample_status_name', 'CANCELADO')
    ->get();
  }
}
