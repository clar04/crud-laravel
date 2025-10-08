<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        Content::factory()->count(15)->create();
        Content::firstOrCreate(
            ['title' => 'Hello World'],
            ['body' => 'This is a sample content item.', 'published' => true]
        );
    }
}
