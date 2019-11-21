<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('units', function (Blueprint $table) {
      
      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('magnitude_id');
      $table->string('unit_name', 25);
      $table->string('unit_nickname', 5);
      $table->timestamps();

      // Indexes
      $table->index('magnitude_id');
      $table->unique('unit_name');
      $table->unique('unit_nickname');

      // Foreign keys
      $table->foreign('magnitude_id')
        ->references('id')
        ->on('magnitudes')
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
    Schema::dropIfExists('units');
    Schema::enableForeignKeyConstraints();
  }
}
