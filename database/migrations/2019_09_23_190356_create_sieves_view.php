<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

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
        SELECT `general_equipment`.`id`,
               `general_equipment_name` AS `sieve_name`,
               `sieve_opening_designation` AS `sieve_designation`,
               `sieve_opening_dimension` AS `sieve_opening`
        FROM   `general_equipment`
               LEFT JOIN `sieve_openings`
               ON `sieve_openings`.`id` = `general_equipment`.`sieve_opening_id`
        WHERE  `equipment_type_id` = 28 AND `equipment_status_id` = 1;
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
