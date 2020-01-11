<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralEquipmentTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('general_equipment', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_type_id');
      $table->unsignedSmallInteger('equipment_status_id');
      $table->unsignedSmallInteger('measurement_equipment_id_a')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('measurement_equipment_id_b')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('measurement_equipment_id_c')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('measurement_equipment_id_d')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('sieve_opening_id')
        ->nullable()
        ->default(null);
      $table->string('general_equipment_name', 6);
      $table->decimal('general_equipment_area_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_area_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_diameter_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_diameter_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_factor', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_height_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_height_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_length_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_length_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_mass_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_mass_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_volume_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_volume_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_temperature_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('general_equipment_temperature_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->date('general_equipment_received_at')
        ->nullable()
        ->default(null);
      $table->date('general_equipment_in_service_at')
        ->nullable()
        ->default(null);
      $table->date('general_equipment_verified_at')
        ->nullable()
        ->default(null);
      $table->date('general_equipment_valid_to')
        ->nullable()
        ->default(null);
      $table->string('general_equipment_trademark', 25)
        ->nullable()
        ->default(null);
      $table->string('general_equipment_model', 25)
        ->nullable()
        ->default(null);
      $table->string('general_equipment_serial', 25)
        ->nullable()
        ->default(null);
      $table->boolean('general_equipment_digital')
        ->nullable()
        ->default('0');
      $table->string('general_equipment_notes', 100)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_type_id');
      $table->index('equipment_status_id');
      $table->index('measurement_equipment_id_a');
      $table->index('measurement_equipment_id_b');
      $table->index('measurement_equipment_id_c');
      $table->index('measurement_equipment_id_d');
      $table->index('sieve_opening_id');
      $table->unique('general_equipment_name');

      // Foreign keys
      $table->foreign('equipment_type_id')
        ->references('id')
        ->on('equipment_types')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('equipment_status_id')
        ->references('id')
        ->on('equipment_statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('measurement_equipment_id_a')
        ->references('id')
        ->on('measurement_equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('measurement_equipment_id_b')
        ->references('id')
        ->on('measurement_equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('measurement_equipment_id_c')
        ->references('id')
        ->on('measurement_equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('measurement_equipment_id_d')
        ->references('id')
        ->on('measurement_equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sieve_opening_id')
        ->references('id')
        ->on('sieve_openings')
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
    Schema::dropIfExists('general_equipment');
    Schema::enableForeignKeyConstraints();
  }
}
