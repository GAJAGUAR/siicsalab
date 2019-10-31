<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('samples', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('work_order_id');
      $table->unsignedSmallInteger('bank_id')
        ->nullable()
        ->default(null);
      $table->unsignedSmallInteger('sample_purpose_id');
      $table->unsignedSmallInteger('sample_weather_id')
        ->nullable()
        ->default(1);
      $table->unsignedSmallInteger('sample_priority_id')
        ->default(1);
      $table->unsignedSmallInteger('sample_status_id')
        ->default(1);
      $table->time('sample_time');
      $table->string('sample_description', 250);
      $table->string('sample_treatment', 100)
        ->nullable()
        ->default(1);
      $table->string('sample_location', 100)
        ->nullable()
        ->default(null);
      $table->string('sample_road_name', 100)
        ->nullable()
        ->default(null);
      $table->string('sample_road_station_start', 11)
        ->nullable()
        ->default(null);
      $table->string('sample_road_station_end', 11)
        ->nullable()
        ->default(null);
      $table->string('sample_road_station', 11)
        ->nullable()
        ->default(null);
      $table->string('sample_road_body', 20)
        ->nullable()
        ->default(null);
      $table->string('sample_road_side', 20)
        ->nullable()
        ->default(null);
      $table->string('sample_road_stripe', 20)
        ->nullable()
        ->default(null);
      $table->string('sample_road', 200)
        ->virtualAs('
          CONCAT(
            IF(`sample_road_name` <> "", `sample_road_name`, ""),
            IF(`sample_road_station_start` <> "", CONCAT(" DEL KM ", `sample_road_station_start`), ""),
            IF(`sample_road_station_end` <> "", CONCAT(" AL KM ", `sample_road_station_end`), ""),
            IF(`sample_road_station` <> "", CONCAT(" KM ", `sample_road_station`), ""),
            IF(`sample_road_body` <> "", CONCAT(" CUERPO ",`sample_road_body`), ""),
            IF(`sample_road_side` <> "", CONCAT(" LADO ",`sample_road_side`), ""),
            IF(`sample_road_stripe` <> "", CONCAT(" FRANJA ",`sample_road_stripe`), "")
          )
        ');
      $table->decimal('sample_phreatic_level', 4, 2)
        ->nullable()
        ->default(null);
      $table->unsignedTinyInteger('sampling_seq')
        ->nullable()
        ->default(null);
      $table->unsignedTinyInteger('sampling_env_temp')
        ->nullable()
        ->default(null);
      $table->unsignedTinyInteger('sample_seq')
        ->nullable()
        ->default(null);
      $table->string('sample_tests', 100)
        ->nullable()
        ->default(null);
      $table->text('sample_notes')
        ->nullable()
        ->default(null);
      $table->date('sample_receipt_date')
        ->default(today());
      $table->decimal('sample_latitude', 9, 6)
        ->nullable()
        ->default(null);
      $table->decimal('sample_longitude', 9, 6)
        ->nullable()
        ->default(null);
      $table->string('sample_sketch_file', 50)
        ->nullable()
        ->default(null);
      $table->string('sample_stratigraphic_file', 50)
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('work_order_id');
      $table->index('bank_id');
      $table->index('sample_purpose_id');
      $table->index('sample_weather_id');
      $table->index('sample_priority_id');
      $table->index('sample_status_id');

      // Foreign keys
      $table->foreign('work_order_id')
        ->references('id')
        ->on('work_orders')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('bank_id')
        ->references('id')
        ->on('banks')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sample_purpose_id')
        ->references('id')
        ->on('sample_purposes')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sample_weather_id')
        ->references('id')
        ->on('sample_weathers')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sample_priority_id')
        ->references('id')
        ->on('sample_priorities')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('sample_status_id')
        ->references('id')
        ->on('sample_statuses')
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
    Schema::dropIfExists('samples');
    Schema::enableForeignKeyConstraints();
  }
}
