<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1533329575SlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('sliders')) {
            Schema::create('sliders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('subtitle')->nullable();
                $table->string('title_en')->nullable();
                $table->string('subtitle_en')->nullable();
                $table->string('video')->nullable();
                $table->string('url_video')->nullable();                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
