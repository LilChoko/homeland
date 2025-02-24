<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('register_users', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('username')->unique(); // Nombre de usuario único
            $table->string('email')->unique(); // Email único
            $table->string('password'); // Contraseña encriptada
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down() {
        Schema::dropIfExists('register_users');
    }
};

