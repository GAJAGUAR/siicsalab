<?php

namespace Sislab;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail(int $id)
 */
class ExtendedClient extends Model
{
  public function extendedWorks()
  {
    return $this->hasMany(ExtendedWork::class);
  }

  public function indexClient()
  {
    return $this
      ->select(
        'id',
        'client_name',
        'works')
      ->get();
  }

  public function showClient(int $id)
  {
    return $this
      ->select(
        'id',
        'client_name',
        'client_nickname',
        'client_register',
        'client_location')
      ->findOrFail($id);
  }

  public function clientNames()
  {
    return $this
      ->select(
        'id',
        'client_name')
      ->get();
  }
}
