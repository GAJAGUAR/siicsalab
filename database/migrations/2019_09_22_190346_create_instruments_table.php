<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('instruments', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('unit_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('equipment_status_id');
      $table->decimal('instrument_capacity', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('instrument_precision', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('instrument_accuracy', 8, 3)
        ->nullable()
        ->default(null);
      $table->date('instrument_calibrated_at')
        ->nullable()
        ->default(null);
      $table->date('instrument_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('unit_id');
      $table->index('equipment_status_id');

      // Foreign keys
      $table->foreign('equipment_id')
        ->references('id')
        ->on('equipment')
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
    Schema::dropIfExists('instruments');
    Schema::enableForeignKeyConstraints();
  }
}
