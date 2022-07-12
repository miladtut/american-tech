<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar',255);
            $table->string('title_en',255);
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('tags_ar')->nullable();   
            $table->text('tags_en')->nullable();   
            $table->string('numViews',255)->default('0');   
           $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('id')->on('system_constants')->onDelete('cascade');

            $table->tinyInteger('isPublished')->comment("1 =>yes, 0=>no")->default(1);    
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
