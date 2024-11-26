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
            'email' => 'jesse@travelbuy.co.za',
            'password' => bcrypt('jesse@123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Fran',
            'email' => 'fran@travelbuy.co.za',
            'password' => bcrypt('fran@1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Tshego',
            'email' => 'tshego@travelbuy.co.za',
            'password' => bcrypt('tshego@12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Jaylen',
            'email' => 'jaylen@travelbuy.co.za',
            'password' => bcrypt('jaylen@12346'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Zubair',
            'email' => 'zubair@travelbuy.co.za',
            'password' => bcrypt('zubair@12347'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Nyeleti Hlungwani',
            'email' => 'info@asknow.co.za',
            'password' => bcrypt('QlluJaOrprdUdbe'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Lindani Dube',
            'email' => 'lindani@asknow.co.za',
            'password' => bcrypt('d0y3CX5cYNVumVz'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Comfort Maluleke',
            'email' => 'comfort@asknow.co.za',
            'password' => bcrypt('E6nTSAeTTLkjvOu'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Nomsa Mtshali',
            'email' => 'nomsa@asknow.co.za',
            'password' => bcrypt('1me9HIQm6ZG9r2J'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Lauren Pretorius',
            'email' => 'lauren@ias.org.za',
            'password' => bcrypt('of5c9lX8pfn95p5'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Sibusiso Nkosi',
            'email' => 'sibusiso@ias.org.za',
            'password' => bcrypt('M2hVuPoE6pVkzvm'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Lynda Woods',
            'email' => 'lynda@ias.org.za',
            'password' => bcrypt('XZNVYDSOeMlqgLB'),
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
