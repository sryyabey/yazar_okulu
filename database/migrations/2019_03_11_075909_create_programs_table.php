<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('alt_kursu');
            $table->integer('egitimci_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('tarih');
            $table->integer('kontenjan');
            $table->text('konu');
            $table->string('baslik');
            $table->string('slug');
            $table->string('keywords');
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
        Schema::dropIfExists('programs');
    }
}
