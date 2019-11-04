<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('tweets');
        Schema::create('tweets', function (Blueprint $table) {
            $timestamp = Carbon::now()->toDateTimeString();

            $table->bigIncrements('id');
            $table->bigInteger('user_id')
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->bigInteger('twitter_id')->unique();
            $table->string('twitter_username')->unique();
            $table->boolean('hidden')
                ->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
