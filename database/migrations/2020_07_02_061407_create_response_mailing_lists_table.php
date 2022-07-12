<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseMailingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_mailing_lists', function (Blueprint $table) {
            $table->increments('id');
           $table->unsignedInteger('mailList_id');
           $table->unsignedInteger('user_id');
           $table->text('text')->nullable();   
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
        Schema::dropIfExists('response_mailing_lists');
    }
}
