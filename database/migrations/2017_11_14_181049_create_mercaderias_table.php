<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMercaderiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercaderias', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('codigo', 100)->unique();
            $table->string('tipo',100);
            $table->integer('tercero_id')->unsigned();
            $table->enum('estado',['vacio','prestado','lleno','con propietario']);

            $table->foreign('tercero_id')->references('id')->on('terceros')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('mercaderias');
    }
}
