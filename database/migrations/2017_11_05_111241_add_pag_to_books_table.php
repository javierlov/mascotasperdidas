<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPagToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
           $table->integer('pages')->unsigned()->after('name');
           $table->string('isbn')->after('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // $table->dropColumn('pages'); //elimina un solo campo
            $table->dropColumn(['pages','isbn']); //array para varios campos
        });
    }
}
