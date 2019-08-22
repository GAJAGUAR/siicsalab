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

      $table->unsignedSmallInteger('bank_id')->nullable()->default(null);

      $table->unsignedSmallInteger('purpose_id');

      $table->unsignedSmallInteger('weather_id')->nullable()->default(1);

      $table->unsignedSmallInteger('priority_id')->default(1);

      $table->unsignedSmallInteger('status_id')->default(1);

      $table->time('sample_time');

      $table->string('sample_description', 250);

      $table->string('sample_treatment', 100);

      $table->string('sample_location', 100)->nullable()->default(null);

      $table->string('road_name', 100)->nullable()->default(null);

      $table->string('road_station_start', 11)->nullable()->default(null);

      $table->string('road_station_end', 11)->nullable()->default(null);

      $table->string('road_station', 11)->nullable()->default(null);

      $table->string('road_body', 20)->nullable()->default(null);

      $table->string('road_side', 20)->nullable()->default(null);

      $table->string('road', 200)->virtualAs('
        CONCAT(
          IF(`road_name` <> "", `road_name`, ""),
          IF(`road_station_start` <> "", CONCAT(" DEL KM ", `road_station_start`), ""),
          IF(`road_station_end` <> "", CONCAT(" AL KM ", `road_station_end`), ""),
          IF(`road_station` <> "", CONCAT(" KM ", `road_station`), ""),
          IF(`road_body` <> "", CONCAT(" CUERPO ",`road_body`), ""),
          IF(`road_side` <> "", CONCAT(" LADO ",`road_side`), "")
        )
      ');

      $table->decimal('phreatic_level', 4, 2)->nullable()->default(null);

      $table->unsignedTinyInteger('sampling_seq')->nullable()->default(null);

      $table->unsignedTinyInteger('env_temp')->nullable()->default(null);

      $table->unsignedTinyInteger('sample_seq')->nullable()->default(null);

      $table->string('sample_tests', 100)->nullable()->default(null);

      $table->text('sample_notes')->nullable()->default(null);

      $table->date('sample_receipt_date')->default(today());

      $table->double('sample_loc_x')->nullable()->default(null);

      $table->double('sample_loc_y')->nullable()->default(null);

      $table->string('sketch_file', 50)->nullable()->default(null);

      $table->string('stratigraphic_file', 50)->nullable()->default(null);

      $table->timestamps();

      // Indexes
      $table->index('status_id');

      $table->index('work_order_id');

      $table->index('priority_id');

      $table->index('bank_id');

      $table->index('weather_id');

      $table->index('purpose_id');

      // Foreign keys
      $table->foreign('work_order_id')
        ->references('id')->on('work_orders')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('bank_id')
        ->references('id')->on('banks')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('purpose_id')
        ->references('id')->on('purposes')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('weather_id')
        ->references('id')->on('weathers')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('priority_id')
        ->references('id')->on('priorities')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->foreign('status_id')
        ->references('id')->on('statuses')
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
