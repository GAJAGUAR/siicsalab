<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSievesView extends Migration
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
        VIEW `sieves` AS
        SELECT   `equipment`.`id`,
                 `equipment_name` AS `sieve_name`,
                 `sieve_opening_designation` AS `sieve_opening`,
                 `tool_diameter_a` AS `sieve_diameter`,
                 `instrument_name`,
                 `tool_verified_at` AS `sieve_verified_at`,
                 `tool_valid_to` AS `sieve_valid_to`
        FROM     `equipment`
                 LEFT JOIN `tools`
                 ON `tools`.`equipment_id` = `equipment`.`id`
                 LEFT JOIN `sieve_openings`
                 ON `sieve_openings`.`id` = `tools`.`sieve_opening_id`
                 LEFT JOIN `extended_instruments`
                 ON `extended_instruments`.`id` = `tools`.`instrument_id_a`
        WHERE    `equipment_type_id` = 28 AND `equipment_status_id` = 1
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
    DB::statement('DROP VIEW `sieves`;');
  }
}
