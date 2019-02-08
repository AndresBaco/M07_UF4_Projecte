<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function down()
    {
        Schema::dropIfExists('rating');
    }
    public function up()
    {
        Schema::create('rating', function (Blueprint $table) {
            $table->integer("mid");
            $table->foreign("mid")->references("id")->on("movie");
            $table->integer("uid");
            $table->foreign("uid")->references("id")->on("users");
            $table->primary(["mid","uid"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
