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
        Schema::create('userfavorites', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_personal');
        });
        Schema::create('userappointments', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_personal');
            $table->integer('id_service');
            $table->datetime('ap_datetime');
            $table->float('stars')->default(5);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
        });
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('avatar')->default('default.png');
            $table->float('stars')->default(5);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
        Schema::create('personalserviceregion', function (Blueprint $table){
            $table->id();
            $table->integer('id_personal');
            $table->string('region');
        });
        Schema::create('personalgym', function (Blueprint $table){
           $table->id();
           $table->integer('id_personal');
           $table->string('gym');
        });
        Schema::create('personallanguage', function (Blueprint $table){
           $table->id();
           $table->integer('id_personal');
           $table->string('language');
        });
        Schema::create('personalspecialty', function (Blueprint $table){
           $table->id();
           $table->integer('id_personal');
           $table->string('specialty');
        });
        Schema::create('personalpromotionalpacks', function (Blueprint $table){
            $table->id();
            $table->integer('id_personal');
            $table->string('hours');
            $table->string('pricepromotional');
        });
        Schema::create('personalphotos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personal');
            $table->string('url');
        });
        Schema::create('personalreviews', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personal');
            $table->string('rate');
        });
        Schema::create('personalservices', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personal');
            $table->string('name');
            $table->float('price');
            $table->string('description');
        });
        Schema::create('personaltestimonials', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personal');
            $table->string('name');
            $table->float('rate');
            $table->string('body');
        });
        Schema::create('personalavailability', function (Blueprint $table) {
            $table->id();
            $table->integer('id_personal');
            $table->integer('weekday');
            $table->text('hours');
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
        Schema::dropIfExists('userfavorite');
        Schema::dropIfExists('userappointments');
        Schema::dropIfExists('personals');
        Schema::dropIfExists('personalphotos');
        Schema::dropIfExists('personalreviews');
        Schema::dropIfExists('personalservices');
        Schema::dropIfExists('personaltestimonials');
        Schema::dropIfExists('personalavailability');
    }
};
