<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Editing',
                'slug' => 'editing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RGB',
                'slug' => 'rgb',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        Tag::insert($tags);
    }
}