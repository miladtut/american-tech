<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColnToTableConsultation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultation', function (Blueprint $table) {
            //
            $table->unsignedInteger('type');
            $table->text('details');
            $table->foreign('type')->references('id')->on('system_constants')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultation', function (Blueprint $table) {
            //
            $table->dropColumn('type');
            $table->dropColumn('details');

        });
    }
}
