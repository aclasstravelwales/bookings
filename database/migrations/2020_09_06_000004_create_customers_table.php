<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('where_from');
            $table->string('where_to');
            $table->string('driver')->nullable();
            $table->string('vehicle')->nullable();
            $table->boolean('wheelchair')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
