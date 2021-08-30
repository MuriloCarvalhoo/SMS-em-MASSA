<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->text("ID");
            $table->timestamps("UpdatedInDB");
            $table->timestamps("InsertIntoDB");
            $table->timestamps("TimeOut");
            $table->enum('Send', ['yes', 'no'])->default('no');
            $table->enum('Receive', ['yes', 'no'])->default('no');
            $table->string('IMEI',35);
            $table->string('IMSI',35);
            $table->string('NetCode',10)->default('ERROR')->nullable();;
            $table->string('NetName',35)->default('ERROR')->nullable();;
            $table->text('Client');
            $table->integer('Battery',11)->default(-1);
            $table->integer('Signal',11)->default(-1);
            $table->integer('Sent',11)->default(0);
            $table->integer('Received',11)->default(0);

            $table->index('PRIMARY', ['IMEI']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
