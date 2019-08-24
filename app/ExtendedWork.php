<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

class ExtendedWork extends Model
{
  public function get()
  {
    return $this
      ->select(
        'id',
        'work_name')
      ->get();
  }

  public function show(int $id)
  {
    return $this
      ->select(
        'id',
        'client_name',
        'work_name',
        'work_nickname',
        'work_location')
      ->where('id', $id)
      ->first();
  }

  public function showClientWorks(int $id)
  {
    return $this
      ->select(
        'id',
        'work_name')
      ->where('client_id', $id)
      ->get();
  }
}
