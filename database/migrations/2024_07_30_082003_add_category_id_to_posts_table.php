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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after("id")->nullable();

            // ! vincolo di chiave esterna sulla mia colonna x, che fa riferimento alla colonna y della tabella z.
            // # $table->foreignId('category_id')->constrained();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');

            $table->dropColumn("category_id");
        });
    }
};
