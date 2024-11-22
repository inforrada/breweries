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
        //
        Schema::table('bars', function (Blueprint $table) {
            $table->foreignId('user_id')
            -> after('description')
            -> nullable()
            -> constrained('users')
            -> cascadeOnUpdate()
            -> nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('bars', function (Blueprint $table) {
            $table->dropForeign('bars_user_id_foreign');
        });
    }
};
