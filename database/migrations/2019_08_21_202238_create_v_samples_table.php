<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Migrations\Migration;

class CreateVSamplesTable extends Migration
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
        VIEW `v_samples` AS
        SELECT   `samples`.`id`,
                 `work_order_id`,
                 `work_order_date`,
                 `client_name`,
                 `work_name`,
                 `work_location`,
                 `sample_time`,
                 `sample_description`,
                 `sample_treatment`,
                 `sample_location`,
                 `road_name`,
                 `road_body`,
                 `road_side`,
                 `road`,
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
                 `status_name` 
        FROM     `samples` 
                 LEFT JOIN `work_orders` 
                 ON `samples`.`work_order_id` = `work_orders`.`id` 
                 LEFT JOIN `works` 
                 ON `work_orders`.`work_id` = `works`.`id` 
                 LEFT JOIN `clients` 
                 ON `works`.`client_id` = `clients`.`id` 
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
    DB::statement('DROP VIEW `v_samples`;');
  }
}
