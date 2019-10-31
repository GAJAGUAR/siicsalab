<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOvensView extends Migration
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
        VIEW `ovens` AS
        SELECT   `equipment`.`id`,
                 `equipment_name` AS `oven_name`,
                 `tool_temperature_a` AS `oven_temperature`,
                 `instrument_name`,
                 `tool_verified_at` AS `oven_verified_as`,
                 `tool_valid_to` AS `oven_valid_to`
        FROM     `equipment`
                 LEFT JOIN `tools`
                 ON `tools`.`equipment_id` = `equipment`.`id`
                 LEFT JOIN `extended_instruments`
                 ON `extended_instruments`.`id` = `tools`.`instrument_id_a`
        WHERE    `equipment_type_id` = 13 AND `equipment_status_id` = 1
        ORDER BY `equipment`.`id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `ovens`;');
  }
}
