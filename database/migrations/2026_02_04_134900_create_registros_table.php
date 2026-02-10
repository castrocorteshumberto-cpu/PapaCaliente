<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('alumno')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
};
