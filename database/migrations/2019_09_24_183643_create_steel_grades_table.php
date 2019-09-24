<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSteelGradesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('steel_grades', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->string('steel_grade_name', 100);
      $table->timestamps();

      // Indexes
      $table->unique('steel_grade_name');
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
    Schema::dropIfExists('steel_grades');
    Schema::enableForeignKeyConstraints();
  }
}
