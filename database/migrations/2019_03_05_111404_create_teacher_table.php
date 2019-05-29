<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alt_kursu_id');
            $table->string('ad');
            $table->string('soyad');
            $table->string('brans');
            $table->string('sosyal_medya')->nullable();
            $table->string('telefon');
            $table->string('email');
            $table->text('icerik');
            $table->integer('onay');
            $table->text('img')->nullable();
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
        Schema::dropIfExists('teacher');
    }
}
