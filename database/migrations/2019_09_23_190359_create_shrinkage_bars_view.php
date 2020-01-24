<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateShrinkageBarsView extends Migration
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
        VIEW `shrinkage_bars` AS
        SELECT `id`,
               `general_equipment_name` AS `shrinkage_bar_name`,
               CAST((`general_equipment_length_a` + `general_equipment_length_b`) / 2 AS decimal(8, 3)) AS `shrinkage_bar_length`
        FROM   `general_equipment`
        WHERE  `equipment_type_id` = 3 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `shrinkage_bars`;');
  }
}
