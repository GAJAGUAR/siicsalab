<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateSampleTestsView extends Migration
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
        VIEW `sample_tests` AS
        SELECT   `sample_tests`
        FROM     `samples`
        WHERE    `sample_tests` NOT LIKE ""
        GROUP BY `sample_tests`
        ORDER BY `sample_tests`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `sample_tests`;');
  }
}
