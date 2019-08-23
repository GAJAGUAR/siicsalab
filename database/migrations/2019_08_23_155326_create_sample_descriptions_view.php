<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateSampleDescriptionsView extends Migration
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
        VIEW `sample_descriptions` AS
        SELECT   `sample_description`
        FROM     `samples`
        WHERE    `sample_description` NOT LIKE ""
        GROUP BY `sample_description`
        ORDER BY `sample_description`
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `sample_descriptions`;');
  }
}
