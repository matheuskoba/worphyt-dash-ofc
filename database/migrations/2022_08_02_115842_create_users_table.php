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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('default.png');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('tipo');
            $table->float('stars')->default(5);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('cref')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('description')->nullable();
            $table->string('minorprice')->nullable();
            $table->string('majorprice')->nullable();
            $table->string('trialtime')->nullable();
            $table->boolean('face_to_face_service')->default(false);
            $table->boolean('remote_service')->default(false);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
