<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColTextTableSettings extends Migration
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
            $table->text('text_services_ar');
            $table->text('text_services_en');

            $table->text('text_business_ar');
            $table->text('text_business_en');

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
            Schema::dropIfExists('text_services_ar');
            Schema::dropIfExists('text_services_en');
            Schema::dropIfExists('text_business_ar');
            Schema::dropIfExists('text_business_en');

        });
    }
}

