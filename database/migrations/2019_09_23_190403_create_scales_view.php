<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateScalesView extends Migration
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
        VIEW `scales` AS
        SELECT `measurement_equipment`.`id`,
        `measurement_equipment_name` AS `scale_name`,
        CONCAT_WS(
          " ",
          `measurement_equipment_capacity`,
          `unit_nickname`
        ) AS `scale_capacity`,
        CONCAT_WS(
          " ",
          `measurement_equipment_precision`,
          `unit_nickname`
        ) AS `scale_precision`
        FROM   `measurement_equipment`
        LEFT JOIN `units`
        ON `units`.`id` = `measurement_equipment`.`unit_id`
        WHERE  `equipment_type_id` = 4 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('scales_view');
  }
}
