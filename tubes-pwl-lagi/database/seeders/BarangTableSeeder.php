<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('barang')->truncate();

        $barang = [];
        $faker = Factory::create();

        for($i = 1; $i <= 10; $i++) {
            $image = "Post_Image_".rand(1,5).".jpg";
            $date = date('Y-m-d H:i:s');
            $barang[] = [
                'admin_id' => rand(1,5),
                'nama_barang' => $faker->firstName(null),
                'harga_barang' => $faker->numberBetween(1000000,10000000),
                'tipe_barang' => $faker->city(),
                'merk_barang' => $faker->company(),
                'deskripsi_barang' => $faker->sentence(10,true),
                'gambar_barang' => $image,
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }
        \DB::table('barang')->insert($barang);
    }
}
