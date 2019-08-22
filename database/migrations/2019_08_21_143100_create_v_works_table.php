<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateVWorksTable extends Migration
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
        DEFINER = root@localhost
        SQL SECURITY DEFINER
        VIEW `v_works` AS
        SELECT   `works`.`id`,
                 `client_id`,
                 `client_name`,
                 `work_name`,
                 `work_nickname`,
                 `work_location`
        FROM     `works`
                 LEFT JOIN `clients`
                 ON `works`.`client_id` = `clients`.`id`
        ORDER BY `works`.`id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `v_works`;');
  }
}
