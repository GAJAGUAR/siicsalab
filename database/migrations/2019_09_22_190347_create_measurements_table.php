<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('measurements', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('measurement_type_id');
      $table->unsignedSmallInteger('sieve_opening_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('measurer_id')
        ->nullable()
        ->default(null);
      $table->decimal('measurement_value_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('measurement_value_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->date('measurement_verified_at')
        ->nullable()
        ->default(null);
      $table->date('measurement_valid_to')
        ->nullable()
        ->default(null);
      $table->string('measurement_notes', 100)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('sieve_opening_id');
      $table->index('measurer_id');

      // Foreign keys
      $table->foreign('equipment_id')
        ->references('id')
        ->on('equipments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sieve_opening_id')
        ->references('id')
        ->on('sieve_openings')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('measurer_id')
        ->references('id')
        ->on('measurers')
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
    Schema::dropIfExists('measurements');
    Schema::enableForeignKeyConstraints();
  }
}
