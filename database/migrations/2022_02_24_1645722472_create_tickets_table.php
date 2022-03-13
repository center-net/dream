<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("subscriber_id")->constrained("subscribers")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->enum('status',['1','0','2','3']);
            $table->foreignId("damage_id")->constrained("damages")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->string('note')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
