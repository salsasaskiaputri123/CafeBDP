<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //Added Start
        $products = [
            [
                'name' => 'Seblak',
                'image' => 'https://i.pinimg.com/564x/a2/4c/d5/a24cd5106510c99bccb6c79567fc82b0.jpg',
                'price' => 5000,
                'description' => 'PHP Language',
                'stok' => 10
            ],
            [
                'name' => 'Bakso Telor',
                'image' => 'https://i.pinimg.com/564x/f7/e1/60/f7e160e5a81c64b8fc28bd8311048dc0.jpg',
                'price' => 10000,
                'description' => 'Laravel freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Mie Gebetan',
                'image' => 'https://i.pinimg.com/564x/37/c3/b2/37c3b27ed7a86c23aa1d81a126884404.jpg',
                'price' => 8000,
                'description' => 'Python Language',
                'stok' => 10
            ],
            [
                'name' => 'Mie Ayam',
                'image' => 'https://i.pinimg.com/564x/6b/e8/38/6be838f2583772638efb6c8d9fb76b0e.jpg',
                'price' => 7000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Sambal Matah',
                'image' => 'https://i.pinimg.com/564x/18/1d/9a/181d9aebe1886610f06209a8feb8971c.jpg',
                'price' => 10000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Tereyaki',
                'image' => 'https://i.pinimg.com/564x/75/ef/35/75ef35721c3985c6edca48615c00901f.jpg',
                'price' => 10000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Katsu',
                'image' => 'https://i.pinimg.com/564x/42/2d/bd/422dbd784656f486a22284113bcf30b6.jpg',
                'price' => 10000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Rice Bowl',
                'image' => 'https://i.pinimg.com/564x/11/48/72/114872ab986c66eb32ef28d6cd758c9c.jpg',
                'price' => 10000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Es Teh Lemon',
                'image' => 'https://i.pinimg.com/564x/b0/56/d2/b056d2f4f3eb9dac3cc1ef307fe26d9e.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Kopi',
                'image' => 'https://i.pinimg.com/564x/1b/59/35/1b5935299501303840e372c27fdffcfd.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Matcha',
                'image' => 'https://i.pinimg.com/564x/12/2b/90/122b9007a0b9f87fe10c1c404b350f78.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Jus Alpukat',
                'image' => 'https://i.pinimg.com/564x/1d/7c/05/1d7c05c7a647ead62114547fccab7efb.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Jus Strawbery',
                'image' => 'https://i.pinimg.com/564x/53/e6/f4/53e6f4936692a8c20b647ea84dd2a7f2.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Jus Mangga',
                'image' => 'https://i.pinimg.com/564x/ba/5d/34/ba5d348c3d467f39218e915f77d71a77.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Es Oreo',
                'image' => 'https://i.pinimg.com/564x/20/60/1a/20601ad0c87c6474a3209c8299e95e3d.jpg',
                'price' => 5000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
            [
                'name' => 'Thai Tea',
                'image' => 'https://i.pinimg.com/564x/2a/74/7d/2a747d0502b31ca988ccbb4b8ac9af84.jpg',
                'price' => 10000,
                'description' => 'Codeigniter freamwork',
                'stok' => 10
            ],
           
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
        //Added End
    }
}
