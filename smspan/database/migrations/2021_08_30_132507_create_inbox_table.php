<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox', function (Blueprint $table) {
            $table->unsignedBigInteger("ID");
            $table->timestamps("UpdatedInDB");
            $table->timestamps("ReceivingDateTime");
            $table->text('Text');
            $table->string('SenderNumber',20);
            $table->enum('Coding', ['Default_No_Compression', 'Unicode_No_Compres','Default_Compression','8bit'])->default('Default_No_Compression');
            $table->text('UDH');
            $table->string('SMSCNumber',20);
            $table->integer('Class',11)->default(-1);
            $table->text('TextDecoded');
            $table->text('RecipientID');
            $table->enum('Processed', ['false','true'])->default('false');
            $table->integer('Status',11)->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inbox');
    }
}
