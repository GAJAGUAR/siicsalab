<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateSampleLocationsView extends Migration
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
        VIEW `sample_locations` AS
        SELECT   `sample_location`
        FROM     `samples`
        WHERE    `sample_location` NOT LIKE ""
        GROUP BY `sample_location`
        ORDER BY `sample_location`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `sample_locations`;');
  }
}
