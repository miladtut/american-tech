<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColTitleTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->text('meta_title_en');
            $table->text('meta_desc_en');
            $table->text('hourwork_en');
            $table->string('logo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            Schema::dropIfExists('meta_title_en');
            Schema::dropIfExists('meta_desc_en');
            Schema::dropIfExists('hourwork_en');
            Schema::dropIfExists('logo');

        });
    }
}
