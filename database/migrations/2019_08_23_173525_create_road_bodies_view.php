<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateRoadBodiesView extends Migration
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
        VIEW `road_bodies` AS
        SELECT   `road_body`
        FROM     `samples`
        WHERE    `road_body` NOT LIKE ""
        GROUP BY `road_body`
        ORDER BY `road_body`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `road_bodies`;');
  }
}
