<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* => ME, for page 92 */
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
        });
        
//        Schema::create('profiles', function (Blueprint $table) {
//            $table->id();
//            $table->timestamps();
//        });
        /* => ME, for page 92 */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
