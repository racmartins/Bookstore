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
        Schema::table('books', function (Blueprint $table) {
            // Remova a chave estrangeira existente
            $table->dropForeign(['author_id']);

            // Crie a coluna author_id novamente como nullable se ainda não for
            $table->unsignedBigInteger('author_id')->nullable()->change();

            // Adicione a nova chave estrangeira com a ação desejada
            $table->foreign('author_id')
                  ->references('id')->on('authors')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
};
