<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateExtendedWorkOrdersView extends Migration
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
        VIEW `extended_work_orders` AS
        SELECT   `work_orders`.`id`,
                 `work_id`,
                 `work_name`,
                 `work_nickname`,
                 `work_location`,
                 `client_name`,
                 `employee_id`,
                 `employee_name`,
                 `employee_nickname`,
                 `work_order_date`,
                 COUNT(`samples`.`id`) AS `samples`
        FROM     `work_orders`
                 LEFT JOIN `works`
                 ON `work_orders`.`work_id` = `works`.`id`
                 LEFT JOIN `clients`
                 ON `works`.`client_id` = `clients`.`id`
                 LEFT JOIN `employees`
                 ON `work_orders`.`employee_id` = `employees`.`id`
                 LEFT JOIN `samples`
                 ON `samples`.`work_order_id` = `work_orders`.`id`
        GROUP BY `work_orders`.`id`
        ORDER BY `work_orders`.`id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_work_orders`;');
  }
}
