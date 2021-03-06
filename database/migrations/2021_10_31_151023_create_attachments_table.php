<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('original_filename');
            $table->string('filename');
            $table->string('path');
            $table->string('content_type');
            $table->text('metadata')->nullable();
            /**
             * TODO: Sementara dinonaktifkan.
             *
             * Untuk menghubugnkan relasi antara tabel [attachment] dengan [post/product]
             * maka dibuat relasi one to one/many.
             * $table->string('attachable_id');
             * $table->string('attachable_type');
             */
            $table->unsignedBigInteger('byte_size');
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
        Schema::dropIfExists('attachments');
    }
}
