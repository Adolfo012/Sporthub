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
    {   #Laragon terminal command: php artisan migrate (run the migrations)
        #Revert changes command: php artisan migrate:rollback
        Schema::create('users', function (Blueprint $table) { #Users Table
            $table->id();
            $table->string('name', 60);
            $table->string('fsurname', 50); #Father's surname
            $table->string('msurname', 50); #Mother's surname
            $table->string('nickname', 50)->nullable(); 
            $table->string('email')->unique(); #Default length 255
            $table->string('gender');   #Default length 255
            $table->string('password'); #Default length 255
            $table->date('birthdate');
            #Attribute outside table definition
            $table->timestamps(); #Date and time of any change
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
