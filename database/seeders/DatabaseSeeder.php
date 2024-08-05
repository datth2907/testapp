<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call(PostSeeder::class);
        $images = Storage::allFiles('/images');
        foreach ($images as $image) {
            Image::factory()->create([
                'file' => $image,
                'dimension' => Image::getImageDimension($image)
            ]);
        }
    }

    
}
