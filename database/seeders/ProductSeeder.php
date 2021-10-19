<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Injection your owner',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-04.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);


        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]); 
        
        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

        Product::create([
            'name' => 'Injection your owner 1',
            'description' => 'Test description',
            'thumbnail' => 'assets/images/product-03.jpg',
            'is_available' => true
        ]);

    }
}
