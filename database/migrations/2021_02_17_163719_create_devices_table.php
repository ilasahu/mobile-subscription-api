<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uId')->index();
            $table->unsignedBigInteger('appId')->index();
            $table->string('language')->nullable();
            $table->string('os')->nullable();
            $table->string('purchase_receipt')->nullable();
            $table->enum('subscription_status', ['active', 'expired', 'cancelled'])->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->unique(array('uId', 'appId'));            
            $table->timestamps();
            $table->foreign('appId')->references('id')->on('applications');
            $table->boolean('is_queued')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
