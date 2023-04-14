<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('siswa_id', 50);
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->string('guru_id', 50);
            $table->foreign('guru_id')->references('id')->on('guru');
            $table->double('nilai');
            $table->string('jenis', 50);
            $table->text('keterangan');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('nilai');
    }
};
