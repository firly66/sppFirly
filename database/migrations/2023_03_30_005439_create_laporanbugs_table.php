<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporanbugs', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['functional errorr', 'performance defects', 'usability defects', 'compatibility erorr', 'security erorr', 'syntax erorr', 'logic erorr']);
            $table->string('deskripsi');
            $table->date('tglKejadian');
            $table->string('pelapor');
            $table->enum('status', ['reported', 'on progres', 'solved']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporanbugs');
    }
};
