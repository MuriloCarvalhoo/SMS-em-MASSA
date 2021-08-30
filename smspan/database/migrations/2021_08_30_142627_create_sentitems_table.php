<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentitems', function (Blueprint $table) {
            $table->unsignedBigInteger("ID");
            $table->timestamps("UpdatedInDB");
            $table->timestamps("InsertIntoDB");
            $table->timestamps("SendingDateTime");
            $table->nullableTimestamps("DeliveryDateTime");
            $table->text('Text');
            $table->string('DestinationNumber',20);
            $table->enum('Coding', ['Default_No_Compression', 'Unicode_No_Compres','Default_Compression','8bit']);
            $table->text('UDH')->default(NULL);
            $table->integer('Class',11)->default(-1);
            $table->text('TextDecoded');
            $table->string('SenderID',255)->default(NULL);
            $table->integer('SequencePosition',11)->default(1);
            $table->enum('Status', ['SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved'])->default('SendingOK');
            $table->integer('StatusError',11)->default(-1);
            $table->integer('TPMR',11)->default(-1);
            $table->integer('RelativeValidity',11)->default(-1);
            $table->text('CreatorID');
            $table->integer('StatusCode',11)->default(-1);

            $table->index('sentitems_date', ['DeliveryDateTime']);
            $table->index('sentitems_tpmr', ['TPMR']);
            $table->index('sentitems_dest', ['DestinationNumber']);
            $table->index('sentitems_sender', ['SenderID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentitems');
    }
}
