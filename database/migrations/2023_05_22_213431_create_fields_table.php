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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string("special", 56);
            $table->integer("experience");
            $table->string("medli", 56);
            $table->integer("del_flg")->default(0);
            $table->unsignedBigInteger("doctor_id");
            $table->timestamps();
            $table->foreign("doctor_id")
                ->references("id")
                ->on("doctorlists")
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
