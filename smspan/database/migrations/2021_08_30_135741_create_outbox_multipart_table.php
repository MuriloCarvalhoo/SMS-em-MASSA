<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutboxMultipartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbox_multipart', function (Blueprint $table) {
            $table->unsignedBigInteger("ID");
            $table->text('Text')->default(NULL)->nullable();
            $table->enum('Coding', ['Default_No_Compression', 'Unicode_No_Compres','Default_Compression','8bit']);
            $table->text('UDH')->default(NULL)->nullable();
            $table->integer('Class',11)->default(-1)->nullable();
            $table->text('TextDecoded')->default(NULL)->nullable();
            $table->integer('SequencePosition',11);
            $table->enum('Status', ['SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved'])->default('Reserved');
            $table->integer('StatusCode',11)->default(-1);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outbox_multipart');
    }
}
