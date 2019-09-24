<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('statuses', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->string('status_name', 50);
      $table->timestamps();

      // Indexes
      $table->unique('status_name');
    });
    Schema::enableForeignKeyConstraints();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::disableForeignKeyConstraints();
    Schema::dropIfExists('statuses');
    Schema::enableForeignKeyConstraints();
  }
}
