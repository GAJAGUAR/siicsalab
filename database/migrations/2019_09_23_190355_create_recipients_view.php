<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

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
        SELECT `id`,
               `general_equipment_name` AS `recipient_name`,
               CAST((`general_equipment_mass_a` + `general_equipment_mass_b`) / 2 AS decimal(8, 3)) AS `recipient_mass`,
               CAST((`general_equipment_volume_a` + `general_equipment_volume_b`) / 2 AS decimal(8, 3)) AS `recipient_volume`
        FROM   `general_equipment`
        WHERE  `equipment_type_id` = 25 AND `equipment_status_id` = 1;
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
