<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();

    Schema::create('banks', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';

      $table->charset = 'utf8mb4';

      $table->collation = 'utf8mb4_spanish_ci';

      $table->smallIncrements('id');

      $table->string('bank_name', 50);

      $table->string('bank_location', 500);

      $table->timestamps();

      // Indexes
      $table->unique('bank_name');
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

    Schema::dropIfExists('banks');

    Schema::enableForeignKeyConstraints();
  }
}
