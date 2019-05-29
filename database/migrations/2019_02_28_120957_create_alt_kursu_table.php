<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltKursuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alt_kursu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_kursu_id');
            $table->string('başlık');
            $table->text('icerik');
            $table->string('slug');
            $table->string('keywords');
            $table->text('img')->nullable();
            $table->integer('onay');
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
        Schema::dropIfExists('alt_kursu');
    }
}
