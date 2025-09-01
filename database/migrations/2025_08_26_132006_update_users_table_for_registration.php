<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_image_path')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nationality',
                'country_of_residence',
                'id_type',
                'id_image_path',
                'first_name',
                'last_name',
                'date_of_birth',
                'phone',
                'address',
            ]);
        });
    }
};
