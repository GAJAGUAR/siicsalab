<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSteelTestsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('steel_tests', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('sample_id');
      $table->unsignedSmallInteger('scale_id');
      $table->unsignedSmallInteger('steel_type_id');
      $table->unsignedSmallInteger('steel_grade_id');
      $table->unsignedSmallInteger('steel_caliber_id');
      $table->unsignedSmallInteger('steel_framework_id')
        ->nullable()
        ->default(null);
      $table->date('steel_test_start_date');
      $table->date('steel_test_end_date');
      $table->string('steel_trademark', 25)
        ->nullable()
        ->default(null);
      $table->decimal('steel_mass', 5, 1);
      $table->decimal('steel_long', 3, 1);
      $table->decimal('steel_lug_offset', 4, 2);
      $table->decimal('steel_lug_height', 4, 2);
      $table->decimal('steel_lug_angle', 3, 1);
      $table->decimal('steel_rib_width', 4, 2);
      $table->string('steel_metallurgical_attack', 25)
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('steel_yield_tensile_stregnt');
      $table->unsignedSmallInteger('steel_ultimate_tensile_strenght');
      $table->unsignedSmallInteger('steel_welding_strength')
        ->nullable()
        ->default(null);
      $table->decimal('steel_elongation', 3, 1);
      $table->boolean('steel_bend_test')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Foreign keys
      $table->foreign('sample_id')
        ->references('id')
        ->on('samples')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('scale_id')
        ->references('id')
        ->on('scales')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('steel_type_id')
        ->references('id')
        ->on('steel_types')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('steel_grade_id')
        ->references('id')
        ->on('steel_grades')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('steel_caliber_id')
        ->references('id')
        ->on('steel_calibers')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('steel_framework_id')
        ->references('id')
        ->on('steel_frameworks')
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
    Schema::dropIfExists('steel_tests');
    Schema::enableForeignKeyConstraints();
  }
}
