<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
                $price = str_replace('$', '', $comic['price']);//modifico il prezzo e lo rendo un valore decimale 
            Comic::create([
                'title' => $comic['title'],
                'description' => $comic['description'],
                'price' => $price,
                'thumb' => $comic['thumb'],
                'series' => $comic['series'],
                'sale_date' => $comic['sale_date'],
                'type' => $comic['type'],
                'artists' => implode('| ', $comic['artists']),
                'writers' => implode('| ', $comic['writers']),
            ]);
        }
    }
}
