<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateWatchGlassesView extends Migration
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
        VIEW `watch_glasses` AS
        SELECT `id`,
               `general_equipment_name` AS `watch_glass_name`,
               CAST((`general_equipment_mass_a` + `general_equipment_mass_b`) / 2 AS decimal(8, 3)) AS `watch_glass_mass`
        FROM   `general_equipment`
        WHERE  `equipment_type_id` = 31 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `watch_glasses`;');
  }
}
