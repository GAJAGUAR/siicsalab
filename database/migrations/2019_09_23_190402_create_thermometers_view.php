<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateThermometersView extends Migration
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
        VIEW `thermometers` AS
        SELECT `measurement_equipment`.`id`,
        `measurement_equipment_name` AS `thermometer_name`,
        CONCAT_WS(
          " ",
          `measurement_equipment_capacity`,
          `unit_nickname`
        ) AS `thermometer_capacity`,
        CONCAT_WS(
          " ",
          `measurement_equipment_precision`,
          `unit_nickname`
        ) AS `thermometer_precision`
        FROM   `measurement_equipment`
        LEFT JOIN `units`
        ON `units`.`id` = `measurement_equipment`.`unit_id`
        WHERE  `equipment_type_id` = 29 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('thermometers_view');
  }
}
