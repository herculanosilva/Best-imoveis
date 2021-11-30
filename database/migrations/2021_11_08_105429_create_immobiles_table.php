<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immobiles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);//titulo
            $table->integer('ground'); //tereno
            $table->integer('living_room'); //sala de estar
            $table->integer('bathroom'); //banheiro
            $table->integer('room'); //dormitorio
            $table->integer('garage'); //garagem
            $table->text('description')->nullable(); //descrição
            $table->decimal('price', 12, 2); //preço
            //chaves estrangeiras | anterior e novos maneira de fazer
            // $table->unsignedBigInteger('city_id');
            // $table->foreign('city_id')->references('id')->on('cities');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->foreignId('finality_id')->constrained('finalities')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immobiles');
    }
}
