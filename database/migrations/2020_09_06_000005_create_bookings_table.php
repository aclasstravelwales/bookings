<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('town');
            $table->string('county');
            $table->string('post_code');
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
