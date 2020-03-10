<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('equipments', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_type_id');
      $table->unsignedSmallInteger('equipment_status_id');
      $table->string('equipment_name', 6);
      $table->date('equipment_received_at')
        ->nullable()
        ->default(null);
      $table->date('equipment_in_service_at')
        ->nullable()
        ->default(null);
      $table->date('equipment_verified_at')
        ->nullable()
        ->default(null);
      $table->date('equipment_valid_to')
        ->nullable()
        ->default(null);
      $table->string('equipment_trademark', 25)
        ->nullable()
        ->default(null);
      $table->string('equipment_model', 25)
        ->nullable()
        ->default(null);
      $table->string('equipment_serial', 25)
        ->nullable()
        ->default(null);
      $table->boolean('equipment_digital')
        ->nullable()
        ->default('0');
      $table->string('equipment_notes', 100)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_type_id');
      $table->index('equipment_status_id');
      $table->unique('equipment_name');

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
    Schema::dropIfExists('equipments');
    Schema::enableForeignKeyConstraints();
  }
}
