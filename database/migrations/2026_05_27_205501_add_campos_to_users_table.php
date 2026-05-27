<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('carnet', 20)->nullable()->after('username');
            $table->string('celular', 20)->nullable()->after('carnet');
            $table->string('gmail', 150)->nullable()->after('celular');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['carnet', 'celular', 'gmail']);
        });
    }
};