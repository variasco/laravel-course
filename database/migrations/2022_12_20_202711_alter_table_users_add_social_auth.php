<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function (Blueprint $table)
        {
            $table->string("avatar", 255)->nullable();
            $table->string("token", 255)->nullable();
            $table->string("refresh_token", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function (Blueprint $table)
        {
            $table->dropColumn("avatar");
            $table->dropColumn("token");
            $table->dropColumn("refresh_token");
        });
    }
};
