<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->unique();
            //format 'Y-m-d H:i:s'
            $table->dateTime('deadline');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('state')->nullable()->default('open');
            $table->boolean('assigned')->nullable()->default(false);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tikets');
    }
}
