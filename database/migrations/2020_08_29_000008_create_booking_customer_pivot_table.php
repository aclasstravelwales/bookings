<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('booking_customer', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_1906633')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_1906633')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
}
