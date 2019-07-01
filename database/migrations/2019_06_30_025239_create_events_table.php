<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('slug',250)->unique()->nullable(); //Url Amigable
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('date')->nullable();
            $table->string('place')->nullable();
            $table->mediumText('thematic')->nullable();
            $table->mediumText('schedule')->nullable();
            $table->mediumText('contact')->nullable();
            $table->string('background_top',250)->nullable();
            $table->string('background_bottom', 250)->nullable();
            $table->enum('status',['publicado','borrador'])->default('borrador');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
