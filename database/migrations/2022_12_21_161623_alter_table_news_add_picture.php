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
        Schema::table("news", function (Blueprint $table)
        {
            $table->string("picture", 255)->nullable();
            $table->string("link", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("news", function (Blueprint $table)
        {
            $table->dropColumn("picture");
            $table->dropColumn("link");
        });
    }
};
