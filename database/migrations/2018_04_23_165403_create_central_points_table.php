<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentralPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central_points', function (Blueprint $table) {
            $table->increments('id');
			$table->string('code');
			  $table->string('name');
			  $table->integer('district_id')->unsigned();
			$table->foreign('district_id')->references('id')->on('districts');
			$table->integer('thana_id')->unsigned();
			$table->foreign('thana_id')->references('id')->on('thanas');
			$table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('central_points');
    }
}
