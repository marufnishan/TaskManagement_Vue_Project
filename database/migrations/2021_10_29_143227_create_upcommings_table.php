<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcommingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcommings', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->boolean("completed")->default(false);
            $table->boolean("approved")->default(false);
            $table->boolean("waiting")->default(false);
            $table->string("taskId");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upcommings');
    }
}
