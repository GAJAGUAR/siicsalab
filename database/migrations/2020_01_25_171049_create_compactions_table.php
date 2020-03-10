<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompactionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('compactions', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('sample_id');
      $table->unsignedSmallInteger('compaction_type_id');
      $table->unsignedSmallInteger('compaction_variant_id');
      $table->unsignedSmallInteger('compaction_mold_id');
      $table->unsignedSmallInteger('compaction_rammer_id');
      $table->unsignedSmallInteger('scale_a_id');
      $table->unsignedSmallInteger('scale_b_id');
      $table->unsignedSmallInteger('oven_id');
      $table->unsignedSmallInteger('thermometer_id');
      $table->unsignedSmallInteger('employee_id');
      $table->date('compaction_date_start');
      $table->date('compaction_date_end');
      $table->decimal('compaction_mold_mass', 7, 3);
      $table->decimal('compaction_mold_volume', 7, 3);
      $table->timestamps();

      // Indexes
      $table->index('sample_id');
      $table->index('compaction_type_id');
      $table->index('compaction_variant_id');
      $table->index('compaction_mold_id');
      $table->index('compaction_rammer_id');
      $table->index('scale_a_id');
      $table->index('scale_b_id');
      $table->index('oven_id');
      $table->index('thermometer_id');
      $table->index('employee_id');

      // Foreign keys
      $table->foreign('sample_id')
        ->references('id')
        ->on('samples')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('compaction_type_id')
        ->references('id')
        ->on('compaction_types')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('compaction_variant_id')
        ->references('id')
        ->on('compaction_variants')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('compaction_mold_id')
        ->references('id')
        ->on('equipments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('compaction_rammer_id')
        ->references('id')
        ->on('equipments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('scale_a_id')
        ->references('id')
        ->on('measurements')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('scale_b_id')
        ->references('id')
        ->on('measurements')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('oven_id')
        ->references('id')
        ->on('equipments')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('thermometer_id')
        ->references('id')
        ->on('measurements')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('employee_id')
        ->references('id')
        ->on('employees')
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
    Schema::dropIfExists('compactions');
    Schema::enableForeignKeyConstraints();
  }
}
