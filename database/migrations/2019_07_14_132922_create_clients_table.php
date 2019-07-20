<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('clients', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->string('client_name', 150);
      $table->string('client_nickname', 50);
      $table->string('client_register', 25)->nullable()->default(null);
      $table->string('client_location', 250)->nullable()->default(null);
      $table->timestamps();

      // Indexes
      $table->unique('client_name');
      $table->unique('client_nickname');
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
    Schema::dropIfExists('clients');
    Schema::enableForeignKeyConstraints();
  }
}
