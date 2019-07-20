<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::disableForeignKeyConstraints();
    Schema::create('users', function (Blueprint $table) {

      // DDL
      $table->engine = 'InnoDB';
      $table->charset = 'utf8mb4';
      $table->collation = 'utf8mb4_spanish_ci';
      $table->smallIncrements('id');
      $table->unsignedSmallInteger('role_id')->nullable()->default(null);
      $table->unsignedSmallInteger('employee_id')->nullable()->default(null);
      $table->string('name', 25);
      $table->string('email', 50);
      $table->timestamp('email_verified_at')->nullable()->default(null);
      $table->string('password', 75);
      $table->rememberToken();
      $table->timestamps();

      // Indexes
      $table->index('role_id');
      $table->index('employee_id');
      $table->unique('email');

      // Foreign keys
      $table->foreign('role_id')
        ->references('id')->on('roles')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreign('employee_id')
        ->references('id')->on('employees')
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
    Schema::dropIfExists('users');
    Schema::enableForeignKeyConstraints();
  }
}
