<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1521185878BooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->string('image')->nullable();
                $table->string('path_upload')->nullable();
                $table->string('auther_name')->nullable();
                $table->string('name')->nullable();
                $table->string('mobile')->nullable();
                $table->string('email')->nullable();
                $table->enum('type', array('free', 'sale'))->nullable();
                
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
        Schema::dropIfExists('books');
    }
}
