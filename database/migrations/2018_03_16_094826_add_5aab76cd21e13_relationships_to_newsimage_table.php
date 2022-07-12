<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aab76cd21e13RelationshipsToNewsimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsimages', function(Blueprint $table) {
            if (!Schema::hasColumn('newsimages', 'news_id')) {
                $table->integer('news_id')->unsigned()->nullable();
                $table->foreign('news_id', '130981_5aab76cad2baa')->references('id')->on('news')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newsimages', function(Blueprint $table) {
            
        });
    }
}
