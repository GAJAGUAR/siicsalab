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
      $table->string('bank_road_name', 100)
        ->nullable()
        ->default(null);
      $table->string('bank_road_station', 11)
        ->nullable()
        ->default(null);
      $table->string('bank_road_side', 20)
        ->nullable()
        ->default(null);
      $table->string('bank_location_complement', 100)
        ->nullable()
        ->default(null);
      $table->string('bank_location', 250)
        ->virtualAs('
          CONCAT(
            IF(`bank_road_name` <> "", `bank_road_name`, ""),
            IF(`bank_road_station` <> "", CONCAT(" KM ", `bank_road_station`), ""),
            IF(`bank_road_side` <> "", CONCAT(" LADO ",`bank_road_side`), ""),
            IF(`bank_location_complement` <> "", CONCAT(" ", `bank_location_complement`), "")
          )
        ');
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
