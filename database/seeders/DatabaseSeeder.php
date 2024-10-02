<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pembayaran;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Admin
        User::create([
            'foto' => null,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $status = ['Pending', 'Selesai'];
        foreach($status as $s){
            Status::create([
                'nama_status' => $s,
            ]);
        }

        Pembayaran::create([
            'nama_pembayaran' => 'Cash',
        ]);
        Pembayaran::create([
            'nama_pembayaran' => 'Transfer',
        ]);
    }
}
