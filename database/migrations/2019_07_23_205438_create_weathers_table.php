<?php

use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateWeathersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();

    Schema::create('weathers', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';

      $table->charset = 'utf8mb4';

      $table->collation = 'utf8mb4_spanish_ci';

      $table->smallIncrements('id');

      $table->string('weather_name', 50);

      $table->timestamps();

      // Indexes
      $table->unique('weather_name');
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

    Schema::dropIfExists('weathers');

    Schema::enableForeignKeyConstraints();
  }
}
