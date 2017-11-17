<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMercaderiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mercaderias', function (Blueprint $table) {
        
           $table->integer('user_id')->unsigned()->after('estado');
           $table->decimal('amount', 5, 2)->after('user_id');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mercaderias', function (Blueprint $table) {
            $table->dropColumn(['user_id','amount']); 
        });
    }
}
