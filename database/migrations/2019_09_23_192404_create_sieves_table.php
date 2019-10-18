<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSievesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('sieves', function (Blueprint $table) {
      
      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('opening_id');
      $table->string('sieve_name', 6);
      $table->decimal('sieve_diameter', 3, 1)
        ->nullable()
        ->default(null);
      $table->string('sieve_trademark', 25)
        ->nullable()
        ->default(null);
      $table->date('sieve_verified_at')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->unique('sieve_name');

      // Foreign keys
      $table->foreign('opening_id')
        ->references('id')
        ->on('openings')
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
    Schema::dropIfExists('sieves');
    Schema::enableForeignKeyConstraints();
  }
}
