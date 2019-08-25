<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateExtendedWorksView extends Migration
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
        VIEW `extended_works` AS
        SELECT   `works`.`id`,
                 `client_id`,
                 `client_name`,
                 `work_name`,
                 `work_nickname`,
                 `work_location`,
                 COUNT(`work_orders`.`id`) AS `work_orders`
        FROM     `works`
                 LEFT JOIN `clients`
                 ON `works`.`client_id` = `clients`.`id`
                 LEFT JOIN `work_orders`
                 ON `work_orders`.`work_id` = `works`.`id`
        GROUP BY `works`.`id`
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
    DB::statement('DROP VIEW `extended_works`;');
  }
}
