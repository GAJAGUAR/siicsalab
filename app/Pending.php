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
      'purpose_name',
      'sample_description',
      'sample_receipt_date')
    ->where('status_name', 'PENDIENTE')
    ->orWhere('status_name', 'EN PROCESO')
    ->orWhere('status_name', 'FINALIZADO')
    ->orWhere('status_name', 'CANCELADO')
    ->get();
  }
}
