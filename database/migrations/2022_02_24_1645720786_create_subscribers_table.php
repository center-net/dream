<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subscriberName');
            $table->string('mobile');
            $table->enum('type',['1','0']);
            $table->foreignId("region_id")->constrained("regions")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("street_id")->constrained("streets")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->string('address');
            $table->longtext('note')->nullable();
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
        Schema::dropIfExists('subscribers');
    }
}