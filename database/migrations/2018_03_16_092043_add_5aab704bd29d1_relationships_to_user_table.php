<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aab704bd29d1RelationshipsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', '130948_5aab6e39b1c98')->references('id')->on('roles')->onDelete('cascade');
                }
                if (!Schema::hasColumn('users', 'college_id')) {
                $table->integer('college_id')->unsigned()->nullable();
                $table->foreign('college_id', '130948_5aab704968342')->references('id')->on('colleges')->onDelete('cascade');
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
        Schema::table('users', function(Blueprint $table) {
            
        });
    }
}
