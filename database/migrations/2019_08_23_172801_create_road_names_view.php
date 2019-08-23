<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateRoadNamesView extends Migration
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
        VIEW `road_names` AS
        SELECT   `road_name`
        FROM     `samples`
        WHERE    `road_name` NOT LIKE ""
        GROUP BY `road_name`
        ORDER BY `road_name`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `road_names`;');
  }
}
