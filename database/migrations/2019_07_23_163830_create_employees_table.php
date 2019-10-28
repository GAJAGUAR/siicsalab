<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('employees', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('position_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('scholarship_id')
        ->nullable()
        ->default(null);
      $table->string('employee_nickname', 30);
      $table->string('employee_title', 5)
        ->nullable()
        ->default('C');
      $table->string('first_name_1', 15);
      $table->string('first_name_2', 15)
        ->nullable()
        ->default(null);
      $table->string('last_name_1', 15);
      $table->string('last_name_2', 15)
        ->nullable()
        ->default(null);
      $table->string('employee_name', 70)
        ->virtualAs('
          CONCAT_WS(" ",
            `employee_title`,
            `first_name_1`,
            `first_name_2`,
            `last_name_1`,
            `last_name_2`)
          ');
      $table->date('employee_birthdate')
        ->nullable()
        ->default(null);
      $table->boolean('employee_gender')
        ->nullable()
        ->default('0');
      $table->timestamps();

      // Indexes
      $table->index('scholarship_id');
      $table->index('position_id');

      // Foreign keys
      $table->foreign('scholarship_id')
        ->references('id')
        ->on('scholarship')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('position_id')
        ->references('id')
        ->on('positions')
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
    Schema::dropIfExists('employees');
    Schema::enableForeignKeyConstraints();
  }
}
