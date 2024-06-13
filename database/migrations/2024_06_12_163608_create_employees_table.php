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
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();

            $table->string('name', 255);
            $table->string('email', 191)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('cpf')->nullable()->unsigned();
            $table->string('role', 20);
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->date('birthdate')->nullable();

            $table->foreignId('business_id')->nullable()->constrained()->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();

            $table->index('business_id');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
            $table->dropIndex(['business_id']);
        });

        Schema::dropIfExists('employees');
    }
};
