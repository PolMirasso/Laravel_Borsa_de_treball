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



        Schema::create('requests', function (Blueprint $table) {
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('offer_id');
            $table->primary(['student_id', 'offer_id']);

            $table->text('msg_user');
            $table->string('state');
            $table->boolean('visibility');
            $table->dateTime('send_date');
            $table->dateTime('responce_date');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('offer_id')->references('offer_id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
