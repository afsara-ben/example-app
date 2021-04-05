<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Mobile;
use App\Models\Photo;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('username');
            
            // $table->foreignId('user_id')->unsigned()->constrained();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('admin_users');
            
            
            $table->text('email');
            // $table->image('image');
            $table->text('address');
            $table->integer('age');
            $table->string('bio');
            $table->string('post_code_color');
            $table->string('nature');
            // $table->Mobile('mobile')->nullable();
            // $table->integer('mobile')->nullable();
            $table->string('gender');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('currency')->nullable();

            $table->string('photo')->nullable();
            $table->string('file')->nullable();
            // $table->string('multiImages')->nullable();
            // $table->string('multiFiles')->nullable();
            // $table->unsignedBigInteger('photo_id');
            // $table->foreign('photo_id')->references('id')->on('photos');
            


            // $table->jobs('jobs');

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
        Schema::dropIfExists('profiles');
    }
}
