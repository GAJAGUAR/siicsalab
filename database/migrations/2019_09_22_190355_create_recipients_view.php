<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRecipientsView extends Migration
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
        VIEW `recipients` AS
        SELECT   `equipment`.`id`,
                 `equipment_name` AS `recipient_name`,
                 `tool_mass_a` AS `recipient_mass_a`,
                 `tool_mass_b` AS `recipient_mass_b`,
                 `tool_volume_a` AS `recipient_volume`,
                 `instrument_name`,
                 `tool_verified_at` AS `recipient_verified_as`,
                 `tool_valid_to` AS `recipient_valid_to`
        FROM     `equipment`
                 LEFT JOIN `tools`
                 ON `tools`.`equipment_id` = `equipment`.`id`
                 LEFT JOIN `extended_instruments`
                 ON `extended_instruments`.`id` = `tools`.`instrument_id_a`
        WHERE    `equipment_type_id` = 25 AND `equipment_status_id` = 1
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
    DB::statement('DROP VIEW `recipients`;');
  }
}
