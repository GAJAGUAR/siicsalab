<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompactionMoldsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('compaction_molds', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('measurer_id');
      $table->unsignedSmallInteger('measurement_type_id');
      $table->decimal('compaction_mold_value_a', 8, 3);
      $table->decimal('compaction_mold_value_b', 8, 3);
      $table->date('compaction_mold_verified_at')
        ->nullable()
        ->default(null);
      $table->date('compaction_mold_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('measurer_id');
      $table->index('measurement_type_id');

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
      $table->foreign('measurement_type_id')
        ->references('id')
        ->on('measurement_types')
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
    Schema::dropIfExists('compaction_molds');
    Schema::enableForeignKeyConstraints();
  }
}
