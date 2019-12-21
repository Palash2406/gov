<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('attachment_id')->unsigned();
            $table->foreign('attachment_id')->references('id')->on('attachments');
            $table->text('title');
            $table->text('name');
            $table->bigInteger('size')->unsigned();
            $table->text('path');
            $table->string('mime_type',100);
            $table->softDeletes();


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
        Schema::dropIfExists('files');
    }
}
