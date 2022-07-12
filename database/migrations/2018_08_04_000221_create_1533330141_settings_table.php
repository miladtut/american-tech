<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1533330141SettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('address')->nullable();
                $table->string('mobile')->nullable();
                $table->string('email')->nullable();
                $table->text('hourwork')->nullable();
                $table->text('footertext')->nullable();
                $table->string('copyright')->nullable();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('petrest')->nullable();
                $table->string('google')->nullable();
                $table->string('youtube')->nullable();
                $table->string('instagram')->nullable();
                $table->string('titlewebsite')->nullable();
                
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
        Schema::dropIfExists('settings');
    }
}
