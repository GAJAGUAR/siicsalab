<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
                 `employee_name`,
                 COUNT(`work_orders`.`id`) AS `work_orders`
        FROM     `employees`
                 LEFT JOIN `work_orders`
                 ON `employees`.`id` = `work_orders`.`employee_id`
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
    Schema::dropIfExists('extended_employees');
  }
}
