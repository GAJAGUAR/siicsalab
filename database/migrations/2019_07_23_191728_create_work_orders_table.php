<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('work_orders', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('work_id');
      $table->unsignedSmallInteger('employee_id');
      $table->date('work_order_date');
      $table->timestamps();

      // Indexes
      $table->index('employee_id');
      $table->index('work_id');

      // Foreign keys
      $table->foreign('work_id')
        ->references('id')->on('works')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('employee_id')
        ->references('id')->on('employees')
        ->onDelete('cascade')
        ->onUpdate('cascade');
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
    Schema::dropIfExists('work_orders');
    Schema::enableForeignKeyConstraints();
  }
}
