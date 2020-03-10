<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @property mixed id
 * @property mixed bank_name
 * @property mixed bank_road_name
 * @property mixed bank_road_station
 * @property mixed bank_road_side
 * @property mixed bank_location_complement
 * @property mixed bank_latitude
 * @property mixed bank_longitude
 */

class Bank extends Model
{
  public function samples()
  {
    return $this->hasMany(Sample::class);
  }

  public function isValid(Request $request)
  {
    //
  }

  public function list()
  {
    return $this
      ->selectRaw('
        `id`,
        `bank_name`,
        CONCAT(
          IF(
            `bank_road_name` <> "",
            CONCAT(
              `bank_road_name`,
              " "
            ),
            ""
          ),
          IF(
            `bank_road_station` <> "",
            CONCAT(
              "KM ",
              `bank_road_station`,
              " "
            ),
            ""
          ),
          IF(
            `bank_road_side` <> "",
            CONCAT(
              "LADO ",
              `bank_road_side`,
              " "
            ),
            ""
          ),
          IF(
            `bank_location_complement` <> "",
            CONCAT(
              " ",
              `bank_location_complement`
            ),
            ""
          )
        ) AS `bank_location`,
        `bank_latitude`,
        `bank_longitude`
      ')
      ->get();
  }

  public function showBank(Int $id)
  {
    //
  }

  public function saveBank(Request $request, Bank $bank)
  {
    //
  }

  public function bankNames()
  {
    return $this
      ->select(
        'id',
        'bank_name')
      ->get();
  }
}
