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
      $table->string('road_name', 100)
        ->nullable()
        ->default(null);
      $table->string('road_station', 11)
        ->nullable()
        ->default(null);
      $table->string('road_side', 20)
        ->nullable()
        ->default(null);
      $table->string('road_complement', 100)
        ->nullable()
        ->default(null);
      $table->string('road', 200)
        ->virtualAs('
          CONCAT(
            IF(`road_name` <> "", `road_name`, ""),
            IF(`road_station` <> "", CONCAT(" KM ", `road_station`), ""),
            IF(`road_side` <> "", CONCAT(" LADO ",`road_side`), ""),
            IF(`road_complement` <> "", CONCAT(" ", `road_complement`), "")
          )
        ');
      $table->string('bank_location', 500);
      $table->decimal('bank_latitude', 9, 6)
        ->nullable()
        ->default(null);
      $table->decimal('bank_longitude', 9, 6)
        ->nullable()
        ->default(null);
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
