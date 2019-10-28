<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('recipients', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('equipment_id');
      $table->unsignedSmallInteger('scale_id');
      $table->decimal('recipient_mass_a', 5, 1)
        ->nullable()
        ->default(null);
      $table->decimal('recipient_mass_b', 5, 1)
        ->nullable()
        ->default(null);
      $table->date('recipient_verified_at')
        ->nullable()
        ->default(null);
      $table->date('recipient_valid_to')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('equipment_id');
      $table->index('scale_id');

      // Foreign keys
      $table->foreign('equipment_id')
        ->references('id')
        ->on('equipment')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('scale_id')
        ->references('id')
        ->on('scales')
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
    Schema::dropIfExists('recipients');
    Schema::enableForeignKeyConstraints();
  }
}
