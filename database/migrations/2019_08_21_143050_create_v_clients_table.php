<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB;

class CreateVClientsTable extends Migration
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
        VIEW `v_clients` AS
        SELECT   `id`,
                 `client_name`,
                 `client_nickname`,
                 `client_register`,
                 `client_location`
        FROM     `clients`
        ORDER BY `id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `v_clients`;');
  }
}
