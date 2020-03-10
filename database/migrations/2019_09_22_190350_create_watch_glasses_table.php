<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchGlassesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('watch_glasses', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('measurer_id');
      $table->decimal('watch_glass_mass_a', 8, 3);
      $table->decimal('watch_glass_mass_b', 8, 3);
      $table->date('watch_glass_verified_at')
        ->nullable()
        ->default(null);
      $table->date('watch_glass_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('measurer_id');

      // Foreign keys
      $table->foreign('equipment_id')
        ->references('id')
        ->on('equipments')
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
    Schema::dropIfExists('watch_glasses');
    Schema::enableForeignKeyConstraints();
  }
}
