<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideshowpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideshowposts', function (Blueprint $table) {
            $table->id();
            $table->string('AdsType')->nullable();
            $table->string('AdsPosition')->nullable();
            $table->string('avatar')->nullable();
            $table->string('title')->nullable();
            $table->float('ref')->nullable();
            $table->string('active')->nullable();
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
        Schema::dropIfExists('slideshowposts');
    }
}
