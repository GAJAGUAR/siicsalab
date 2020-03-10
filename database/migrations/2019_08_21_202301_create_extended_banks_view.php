<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateExtendedBanksView extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    DB::statement('
      CREATE
        ALGORITHM = UNDEFINED
        -- DEFINER = root@localhost
        SQL SECURITY DEFINER
        VIEW `extended_banks` AS
        SELECT `id`,
               `bank_name`,
               CONCAT(
                 IF(
                   `bank_road_name` <> "",
                   CONCAT(`bank_road_name`, " "),
                   ""
                 ),
                 IF(
                   `bank_road_station` <> "",
                   CONCAT("KM ", `bank_road_station`, " "),
                   ""
                 ),
                 IF(
                   `bank_road_side` <> "",
                   CONCAT("LADO ", `bank_road_side`, " "),
                   ""
                 ),
                 IF(
                   `bank_location_complement` <> "",
                   `bank_location_complement`,
                   ""
                 )
               ) AS `bank_location`,
               `bank_latitude`,
               `bank_longitude`
        FROM   `banks`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_banks`;');
  }
}
