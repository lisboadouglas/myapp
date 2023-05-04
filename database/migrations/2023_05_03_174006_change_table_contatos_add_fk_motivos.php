<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * Adding new column 'motivo_contatos_id' in  contatos table
         */
        Schema::table('contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });
        /**
         * Assigning the values of the 'motivo' column to 'motivo_contatos_id' column
         */
        DB::statement('UPDATE contatos SET motivo_contatos_id = motivo');

        /**
         * Create fk to relationship and deleting 'motivo' column the table
         */
        Schema::table('contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /**
         * Creating 'motivo' column in the table and deleting fk
         */
        Schema::table('contatos', function(Blueprint $table){
            $table->integer('motivo');
            $table->dropForeign('contatos_motivo_contatos_id_foreign');
        });
        /**
         * Assignin the values of the 'motivo_contatos_id' column to 'motivo' column
         */
        DB::statement('UPDATE contatos SET motivo_contatos_id = motivo');
        /**
         * Deleting 'motivo_contatos_id' column the table
         */
        Schema::table('contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
