<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementEquipmentTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('measurement_equipment', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_type_id');
      $table->unsignedSmallInteger('unit_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('equipment_status_id');
      $table->string('measurement_equipment_name', 6);
      $table->decimal('measurement_equipment_capacity', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('measurement_equipment_precision', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('measurement_equipment_accuracy', 8, 3)
        ->nullable()
        ->default(null);
      $table->date('measurement_equipment_calibrated_at')
        ->nullable()
        ->default(null);
      $table->date('measurement_equipment_valid_to')
        ->nullable()
        ->default(null);
      $table->string('measurement_equipment_trademark', 25)
        ->nullable()
        ->default(null);
      $table->string('measurement_equipment_model', 25)
        ->nullable()
        ->default(null);
      $table->string('measurement_equipment_serial', 25)
        ->nullable()
        ->default(null);
      $table->boolean('measurement_equipment_digital')
        ->nullable()
        ->default('0');
      $table->string('measurement_equipment_notes', 100)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_type_id');
      $table->index('unit_id');
      $table->index('equipment_status_id');
      $table->unique('measurement_equipment_name');

      // Foreign keys
      $table->foreign('equipment_type_id')
        ->references('id')
        ->on('equipment_types')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('unit_id')
        ->references('id')
        ->on('units')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('equipment_status_id')
        ->references('id')
        ->on('equipment_statuses')
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
    Schema::dropIfExists('measurement_equipment');
    Schema::enableForeignKeyConstraints();
  }
}
