<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('measurers', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('measurer_type_id');
      $table->unsignedSmallInteger('unit_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('equipment_status_id');
      $table->string('measurer_name', 6);
      $table->decimal('measurer_capacity', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('measurer_precision', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('measurer_accuracy', 8, 3)
        ->nullable()
        ->default(null);
      $table->date('measurer_calibrated_at')
        ->nullable()
        ->default(null);
      $table->date('measurer_valid_to')
        ->nullable()
        ->default(null);
      $table->string('measurer_trademark', 25)
        ->nullable()
        ->default(null);
      $table->string('measurer_model', 25)
        ->nullable()
        ->default(null);
      $table->string('measurer_serial', 25)
        ->nullable()
        ->default(null);
      $table->boolean('measurer_digital')
        ->nullable()
        ->default('0');
      $table->string('measurer_notes', 100)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('measurer_type_id');
      $table->index('unit_id');
      $table->index('equipment_status_id');
      $table->unique('measurer_name');

      // Foreign keys
      $table->foreign('measurer_type_id')
        ->references('id')
        ->on('measurer_types')
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
    Schema::dropIfExists('measurers');
    Schema::enableForeignKeyConstraints();
  }
}
