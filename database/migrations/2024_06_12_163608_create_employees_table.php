<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->string('name', 100)->index();
            $table->string('cnpj', 14)->unique();
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id()->unsignedBigInteger();
            $table->string('name', 255);
            $table->string('email', 191)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('cpf')->nullable()->index();
            $table->string('role', 50)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->unsignedBigInteger('business_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign(['business_id']);
            $table->dropIndex(['business_id']);
        });

        Schema::dropIfExists('employees');
        Schema::dropIfExists('businesses');
    }
};
