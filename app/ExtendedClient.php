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
}
