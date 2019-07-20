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
            $table->string('slug')->unique()->nullable(); //Url Amigable
            $table->string('title');
            $table->string('date')->nullable();
            $table->string('place')->nullable();
            $table->mediumText('thematic')->nullable();
            $table->mediumText('schedule')->nullable();
            $table->mediumText('contact')->nullable();
            $table->mediumText('embed')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('image_top',250)->nullable();
            $table->string('image_bottom', 250)->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->mediumText('terms')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('media')->nullable();
            $table->string('brochure')->nullable();
            $table->enum('status',['published','draft'])->default('draft');
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
