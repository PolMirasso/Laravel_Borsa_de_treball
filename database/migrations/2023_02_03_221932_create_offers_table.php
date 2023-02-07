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
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('offer_id');

            $table->string('company_email');
            $table->string('company_type');
            $table->string('company_nif');
            $table->string('commercial_name');
            $table->string('contact_person');
            $table->string('company_phone');
            $table->string('company_population');
            $table->string('offer_type');
            $table->string('working_day_type');
            $table->string('offer_sector');
            $table->string('characteristics');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
};
