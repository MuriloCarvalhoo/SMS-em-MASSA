<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbox', function (Blueprint $table) {
            $table->unsignedBigInteger("ID");
            $table->timestamps("UpdatedInDB");
            $table->timestamps("InsertIntoDB");
            $table->timestamps("SendingDateTime");
            $table->time("SendBefore")->default("23:59:59");
            $table->time("SendAfter")->default("00:00:00");
            $table->text('Text')->default(NULL)->nullable();
            $table->string('DestinationNumber',20);
            $table->enum('Coding', ['Default_No_Compression', 'Unicode_No_Compres','Default_Compression','8bit']);
            $table->text('UDH')->default(NULL)->nullable();
            $table->integer('Class',11)->default(-1)->nullable();
            $table->text('TextDecoded');
            $table->enum('MultiPart', ['false','true'])->nullable();
            $table->integer('RelativeValidity',11)->default(-1)->nullable();
            $table->string('SenderID',255)->default(NULL)->nullable();
            $table->nullabletimestamps("SendingTimeOut");
            $table->enum('DeliveryReport', ['default','yes','no'])->default('default')->nullable();
            $table->text('CreatorID');
            $table->integer('Retries',3)->default(0)->nullable();
            $table->integer('Priority',11)->default(0)->nullable();
            $table->enum('Status', ['SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved'])->default('Reserved');
            $table->integer('StatusCode',11)->default(-1);

            $table->index('outbox_date', ['SendingDateTime','SendingTimeOut']);
            $table->index('outbox_sender', ['SenderID']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outbox');
    }
}
