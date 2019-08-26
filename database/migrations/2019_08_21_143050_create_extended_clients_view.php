<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateExtendedClientsView extends Migration
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
        VIEW `extended_clients` AS
        SELECT   `clients`.`id`,
                 `client_name`,
                 `client_nickname`,
                 `client_register`,
                 `client_location`,
                 COUNT(`works`.`id`) AS `works`
        FROM     `clients`
                 LEFT JOIN `works`
                 ON `works`.`client_id` = `clients`.`id`
        GROUP BY `clients`.`id`
        ORDER BY `clients`.`id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_clients`;');
  }
}
