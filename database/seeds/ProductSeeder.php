<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\Lorem;
use Faker\Provider\Internet;
use Faker\Provider\Image;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $faker = new Faker();
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new Image($faker));
        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'slug' => $faker->slug,
                'description' => $faker->paragraph(2),
                'units' => $faker->numberBetween(2, 100),
                'price' => $faker->randomFloat(2, 2, 100),
                'image' => $faker->image()
            ]);
        }
    }

}
