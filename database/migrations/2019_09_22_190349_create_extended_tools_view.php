<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateExtendedToolsView extends Migration
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
        VIEW `extended_tools` AS
        SELECT   `tools`.`id`,
                 `equipment_name` AS `tool_name`,
                 `equipment_type_name` AS `tool_type_name`,
                 `sieve_opening_designation` AS `sieve_opening`,
                 `tool_area_a`,
                 `tool_area_b`,
                 `tool_diameter_a`,
                 `tool_diameter_b`,
                 `tool_factor`,
                 `tool_height_a`,
                 `tool_height_b`,
                 `tool_length_a`,
                 `tool_length_b`,
                 `tool_mass_a`,
                 `tool_mass_b`,
                 `tool_volume_a`,
                 `tool_volume_b`,
                 `tool_temperature_a`,
                 `tool_temperature_b`,
                 `tool_notes`,
                 `tool_verified_at`,
                 `tool_valid_to`,
                 `equipment_status_name` AS `tool_status_name`
        FROM     `tools`
                 LEFT JOIN `equipment`
                 ON `equipment`.`id` = `tools`.`equipment_id`
                 LEFT JOIN `sieve_openings`
                 ON `sieve_openings`.`id` = `tools`.`sieve_opening_id`
                 LEFT JOIN `equipment_types`
                 ON `equipment_types`.`id` = `equipment`.`equipment_type_id`
                 LEFT JOIN `equipment_statuses`
                 ON `equipment_statuses`.`id` = `tools`.`equipment_status_id`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_tools`;');
  }
}
