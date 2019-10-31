<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('tools', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('equipment_status_id');
      $table->unsignedSmallInteger('instrument_id_a')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('instrument_id_b')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('instrument_id_c')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('instrument_id_d')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('sieve_opening_id')
        ->nullable()
        ->default(null);
      $table->decimal('tool_area_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_area_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_diameter_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_diameter_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_factor', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_height_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_height_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_length_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_length_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_mass_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_mass_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_volume_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_volume_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_temperature_a', 8, 3)
        ->nullable()
        ->default(null);
      $table->decimal('tool_temperature_b', 8, 3)
        ->nullable()
        ->default(null);
      $table->string('tool_notes', 100)
        ->nullable()
        ->default(null);
      $table->date('tool_verified_at')
        ->nullable()
        ->default(null);
      $table->date('tool_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('equipment_status_id');
      $table->index('instrument_id_a');
      $table->index('instrument_id_b');
      $table->index('instrument_id_c');
      $table->index('instrument_id_d');
      $table->index('sieve_opening_id');

      // Foreign keys
      $table->foreign('equipment_id')
        ->references('id')
        ->on('equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('equipment_status_id')
        ->references('id')
        ->on('equipment_statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('instrument_id_a')
        ->references('id')
        ->on('instruments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('instrument_id_b')
        ->references('id')
        ->on('instruments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('instrument_id_c')
        ->references('id')
        ->on('instruments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('instrument_id_d')
        ->references('id')
        ->on('instruments')
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
    Schema::dropIfExists('tools');
    Schema::enableForeignKeyConstraints();
  }
}
