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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string('resident_id')->nullable()->unique();
            $table->string("barangay_code");
            $table->string("last_name");
            $table->string("middle_name");
            $table->date("birthdate");
            $table->string("gender");
            $table->string("civil_status");
            $table->string("voter_status");
            $table->string("contact_number", 11);
            $table->string("occupation");
            $table->string("citizenship");
            $table->string("religion");
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
