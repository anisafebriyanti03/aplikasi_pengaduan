<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->Increments('id_pengaduan');
            $table->date('tgl_pengaduan');
            $table->char('nik', 17);
            $table->string('isi_laporan');
            $table->string('foto', '190');
            $table->enum('status', [0,'proses','selesai']);
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
        Schema::dropIfExists('penggaduans');
    }
}
