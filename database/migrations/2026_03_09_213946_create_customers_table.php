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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('kana')->index();
            $table->string('tel')->index()->nullable(); 
            $table->string('email'); 
            $table->string('postcode'); 
            $table->string('address'); 
            $table->date('birthday')->nullable(); 
            $table->tinyInteger('gender'); // 0男性, 1女性、2その他 
            $table->text('memo')->nullable(); 
            $table->timestamps();
            // 複合インデックス
            $table->index(['kana','tel']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
