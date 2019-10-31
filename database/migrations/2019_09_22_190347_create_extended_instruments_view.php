<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateExtendedInstrumentsView extends Migration
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
        VIEW `extended_instruments` AS
        SELECT   `instruments`.`id`,
                 `equipment_name` AS `instrument_name`,
                 `equipment_type_name` AS `instrument_type_name`,
                 `magnitude_name`,
                 `unit_name`,
                 `instrument_capacity`,
                 `instrument_precision`,
                 `instrument_accuracy`,
                 `instrument_calibrated_at`,
                 `instrument_valid_to`,
                 `equipment_status_name` AS `instrument_status_same`
        FROM     `instruments`
                 LEFT JOIN `equipment`
                 ON `equipment`.`id` = `instruments`.`equipment_id`
                 LEFT JOIN `equipment_types`
                 ON `equipment_types`.`id` = `equipment`.`equipment_type_id`
                 LEFT JOIN `units`
                 ON `units`.`id` = `instruments`.`unit_id`
                 LEFT JOIN `equipment_statuses`
                 ON `equipment_statuses`.`id` = `instruments`.`equipment_status_id`
                 LEFT JOIN `magnitudes`
                 ON `magnitudes`.`id` = `units`.`magnitude_id`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_instruments`;');
  }
}
