<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateSampleTreatmentsView extends Migration
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
        VIEW `sample_treatments` AS
        SELECT   `sample_treatment`
        FROM     `samples`
        WHERE    `sample_treatment` NOT LIKE ""
        GROUP BY `sample_treatment`
        ORDER BY `sample_treatment`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `sample_treatments`;');
  }
}
