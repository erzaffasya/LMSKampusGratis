<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_channel', function (Blueprint $table) {
            $table->id();
            $table->string('posisi_pekerjaan');
            $table->string('nama_perusahaan');
            $table->string('gaji');
            $table->string('bidang');
            $table->enum('tipe', ['Full Time', 'Part Time', 'Internship'])->default('Full Time');
            $table->string('pengalaman');
            $table->string('foto');
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
        Schema::dropIfExists('job_channel');
    }
}
