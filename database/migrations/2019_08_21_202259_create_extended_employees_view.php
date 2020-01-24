<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateExtendedEmployeesView extends Migration
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
        VIEW `extended_employees` AS
        SELECT   `employees`.`id`,
                 `employee_nickname`,
                 CONCAT_WS(
                   " ",
                   `employee_title`,
                   `first_name_1`,
                   `first_name_2`,
                   `last_name_1`,
                   `last_name_2`
                 ) AS `employee_name`,
                 `position_name`,
                 `scholarship_name`,
                 `employee_birthdate`,
                 `employee_gender`,
                 COUNT(`work_orders`.`id`) AS `work_orders`
        FROM     `employees`
                 LEFT JOIN `work_orders`
                 ON `employees`.`id` = `work_orders`.`employee_id`
                 LEFT JOIN `scholarship`
                 ON `employees`.`scholarship_id` = `scholarship`.`id`
                 LEFT JOIN `positions`
                 ON `employees`.`position_id` = `positions`.`id`
        GROUP BY `employees`.`id`
        ORDER BY `employees`.`id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_employees`;');
  }
}
