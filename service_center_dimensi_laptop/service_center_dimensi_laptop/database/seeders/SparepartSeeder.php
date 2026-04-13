<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('spareparts')->insert([
            [
                'nama' => 'Casing PC Mini ITX INWIN A1 PLUS - PINK',
                'kategori' => 'SEMUA',
                'gambar' => null,
                'deskripsi' => 'Casing PC Mini ITX warna pink, cocok untuk rakitan minimalis.',
                'stok' => 10,
                'harga' => 2500000,
            ],
            [
                'nama' => 'CPU Air Cooler Digital Alliance Gaming KA295 RGB',
                'kategori' => 'SEMUA',
                'gambar' => null,
                'deskripsi' => 'CPU Cooler dengan RGB, cocok untuk gaming.',
                'stok' => 10,
                'harga' => 110000,
            ],
            [
                'nama' => 'RAM Team T-Force Delta RGB DDR5 64GB (2X32GB)',
                'kategori' => 'SEMUA',
                'gambar' => null,
                'deskripsi' => 'RAM performa tinggi untuk kebutuhan gaming dan editing.',
                'stok' => 10,
                'harga' => 6850000,
            ],
            [
                'nama' => 'BATTERY ASUS X550N ORI',
                'kategori' => 'BATTERY LAPTOP',
                'gambar' => null,
                'deskripsi' => 'Baterai original untuk ASUS X550N.',
                'stok' => 8,
                'harga' => 400000,
            ],
            [
                'nama' => 'BATTERY ACER Z1401 ORI',
                'kategori' => 'BATTERY LAPTOP',
                'gambar' => null,
                'deskripsi' => 'Baterai original untuk ACER Z1401.',
                'stok' => 24,
                'harga' => 500000,
            ],
        ]);
    }
}
