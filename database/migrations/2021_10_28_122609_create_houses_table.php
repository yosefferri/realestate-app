<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('address');
                $table->string('country');
                $table->integer('room');
                $table->integer('kitchen');
                $table->integer('garage');
                $table->integer('bathroom');
                $table->enum('TypeContract', ['buy', 'rent','both']);
                $table->float('price_buy');
                $table->float('price_rent');
                $table->date('date');
                $table->time('time');
                $table->timestamps();
            });
    }
    
        public function down()
        {
            Schema::dropIfExists('houses');
        }
    }
