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
      $table->string('recipient_name', 6);
      $table->tinyInteger('recipient_capacity')
        ->nullable()
        ->default(null);
      $table->string('recipient_trademark', 25)
        ->nullable()
        ->default(null);
      $table->date('recipient_verified_at')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->unique('recipient_name');
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
