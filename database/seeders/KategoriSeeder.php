<?php

namespace Database\Seeders;

use App\Models\Admin\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['name' => 'Laptop','slug' => 'laptop'],
            ['name' => 'Mouse','slug' => 'mouse'],
        ];
        DB::table('kategoris')->insert($kategori);
    }
}
