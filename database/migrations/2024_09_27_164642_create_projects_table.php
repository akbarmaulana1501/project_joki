<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nm_project');
            $table->string('deskripsi');
            $table->string('tujuan');
            $table->date('deadline');
            $table->string('fitur');
            $table->string('target_pengguna');
            $table->string('jenis_website');
            $table->string('platform');
            $table->string('handle_name')->nullable(true);
            $table->string('dokumen');
            $table->string('status')->nullable(true);
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
        Schema::dropIfExists('projects');
    }
}
