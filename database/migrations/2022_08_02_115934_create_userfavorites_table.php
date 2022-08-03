<?php

use App\Models\User;
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
        Schema::create('userfavorites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userfavorites', function(Blueprint $table){
            $table->dropForeignIdFor(User::class);
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('userfavorites');
    }
};
