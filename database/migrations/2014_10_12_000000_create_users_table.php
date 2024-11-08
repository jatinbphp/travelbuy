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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Jesse',
            'email' => 'jesse@travelbuy.com',
            'password' => bcrypt('jesse@123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Fran',
            'email' => 'fran@travelbuy.com',
            'password' => bcrypt('fran@1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Tshego',
            'email' => 'tshego@travelbuy.com',
            'password' => bcrypt('tshego@12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Jaylen',
            'email' => 'jaylen@travelbuy.com',
            'password' => bcrypt('jaylen@12346'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Zubair',
            'email' => 'zubair@travelbuy.com',
            'password' => bcrypt('zubair@12347'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
