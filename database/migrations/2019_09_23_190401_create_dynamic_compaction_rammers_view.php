<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicCompactionRammersView extends Migration
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
        VIEW `dynamic_compaction_rammers` AS
        SELECT `id`,
        `general_equipment_name` AS `dynamic_compaction_rammer_name`,
        CAST((`general_equipment_diameter_a` + `general_equipment_diameter_b`) / 2 AS   decimal(8, 3)) AS `dynamic_compaction_rammer_diameter`,
        CAST((`general_equipment_height_a` + `general_equipment_height_b`) / 2 AS   decimal(8, 3)) AS `dynamic_compaction_rammer_height`,
        CAST((`general_equipment_mass_a` + `general_equipment_mass_b`) / 2 AS   decimal(8, 3)) AS `dynamic_compaction_rammer_mass`
        FROM   `general_equipment`
        WHERE  `equipment_type_id` = 20 AND `equipment_status_id` = 1;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('dynamic_compaction_rammers_view');
  }
}
