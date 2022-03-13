<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CreateTroubleshootingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troubleshootings', function (Blueprint $table) {
            $table->bigIncrements('id');
$table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("ticket_id")->constrained("tickets")->references("id")->onUpdate("cascade")->onDelete("cascade");
            $table->string('diagnosis');
            $table->foreignId("action_id")->constrained("actions")->references("id")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('troubleshootings');
    }
}