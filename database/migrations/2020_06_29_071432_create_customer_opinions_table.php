<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_opinions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar',255);
            $table->string('name_en',255);
            $table->text('description_ar');
            $table->text('description_en');
            $table->string('specialization_ar',255);
            $table->string('specialization_en',255);
            $table->string('image');
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
        Schema::dropIfExists('customer_opinions');
    }
}
