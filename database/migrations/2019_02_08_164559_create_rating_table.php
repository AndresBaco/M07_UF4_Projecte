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
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer("mid")->unsigned();
            $table->foreign("mid")->references("id")->on("movies");
            $table->integer("uid")->unsigned();
            $table->foreign("uid")->references("id")->on("users");
            $table->primary(["mid","uid"]);
            $table->enum("rating",[1,2,3,4,5]);
            $table->text("comment");
            $table->timestamps();
        });
    }
    // public function up()
    // {
    //     Schema::create('rating', function (Blueprint $table) {
    //         $table->integer("mid")->unsigned();
    //         $table->foreign("mid")->references("id")->on("movies");
    //         $table->integer("uid")->unsigned();
    //         $table->foreign("uid")->references("id")->on("users");
    //         $table->primary(["mid","uid"]);
    //         $table->enum("rating",[1,2,3,4,5]);
    //         $table->text("comment");
    //         $table->timestamps();
    //     });
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
