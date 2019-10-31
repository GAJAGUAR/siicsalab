<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class SamplePurpose extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function purposeNames()
  {
    return $this
      ->select(
        'id',
        'sample_purpose_name')
      ->get();
  }
}
