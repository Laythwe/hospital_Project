<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctorlists', function (Blueprint $table) {
            $table->id();
            $table->string("name", 256);
            $table->string("age", 56);
            $table->string("phone", 56);
            $table->integer("del_flg")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctorlists');
    }
};
