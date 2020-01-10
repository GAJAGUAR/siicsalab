<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('works', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('client_id');
      $table->string('work_name', 750);
      $table->string('work_nickname', 50);
      $table->string('work_location', 250);
      $table->text('work_notes')
        ->nullable()
        ->default(null);
      $table->timestamps();

      // Indexes
      $table->index('client_id');
      $table->unique('work_nickname');

      // Foreign keys
      $table->foreign('client_id')
        ->references('id')
        ->on('clients')
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
    Schema::dropIfExists('works');
    Schema::enableForeignKeyConstraints();
  }
}
