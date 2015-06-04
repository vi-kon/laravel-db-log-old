<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateLogsTable
 *
 * @author Kovács Vince <vincekovacs@hotmail.com>
 */
class CreateLogsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('vi-kon.db-log.table'), function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('message');
            $table->text('context');
            $table->tinyInteger('level');
            $table->string('channel');
            $table->dateTime('created_at');
            $table->text('extra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('vi-kon.db-log.table'));
    }
}
