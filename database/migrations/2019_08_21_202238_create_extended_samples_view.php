<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateExtendedSamplesView extends Migration
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
        VIEW `extended_samples` AS
        SELECT   `samples`.`id`,
                 `work_order_id`,
                 `work_order_date`,
                 `client_name`,
                 `work_name`,
                 `work_location`,
                 `employee_name`,
                 `sample_time`,
                 `sample_description`,
                 `sample_treatment`,
                 `sample_location`,
                 `sample_road_name`,
                 `sample_road_body`,
                 `sample_road_side`,
                 `sample_road_stripe`,
                 `sample_road`,
                 `bank_name`,
                 `bank_location`,
                 `purpose_name`,
                 `phreatic_level`,
                 `sampling_seq`,
                 `sample_seq`,
                 `env_temp`,
                 `weather_name`,
                 `sample_tests`,
                 `sample_notes`,
                 `sample_receipt_date`,
                 `priority_name`,
                 `status_name`,
                 CONCAT_WS("-",
                           `client_id`,
                           `work_id`,
                           `work_order_id`,
                           `samples`.`id`,
                           `purpose_id`) AS `sample_url`
        FROM     `samples` 
                 LEFT JOIN `work_orders` 
                 ON `samples`.`work_order_id` = `work_orders`.`id` 
                 LEFT JOIN `works` 
                 ON `work_orders`.`work_id` = `works`.`id` 
                 LEFT JOIN `clients` 
                 ON `works`.`client_id` = `clients`.`id` 
                 LEFT JOIN `employees`
                 ON `work_orders`.`employee_id` = `employees`.`id`
                 LEFT JOIN `banks`
                 ON `samples`.`bank_id` = `banks`.`id` 
                 LEFT JOIN `purposes` 
                 ON `samples`.`purpose_id` = `purposes`.`id` 
                 LEFT JOIN `weathers` 
                 ON `samples`.`weather_id` = `weathers`.`id` 
                 LEFT JOIN `priorities` 
                 ON `samples`.`priority_id` = `priorities`.`id` 
                 LEFT JOIN `statuses` 
                 ON `samples`.`status_id` = `statuses`.`id` 
        ORDER BY `samples`.`id`,
                 `work_order_id`;
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    DB::statement('DROP VIEW `extended_samples`;');
  }
}
