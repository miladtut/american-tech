<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColLinkWorkTableOurBusinesses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            //
            $table->string('link')->nullable();
            // $table->unsignedInteger('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_businesses', function (Blueprint $table) {
            //
        Schema::dropIfExists('link');
        Schema::dropIfExists('service_id');
        });
    }
}
