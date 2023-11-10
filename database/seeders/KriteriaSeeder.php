<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            "nama"  =>  [
            'Tinggi tanaman',
            'Ketahanan terhadap penyakit',
            'Ketahanan terhadap hama',
            'Potensi hasil',
            'Umur tanam',
            'Harga'
            ],
            "sifat" =>  [
                'benefit',
                'benefit',
                'benefit',
                'benefit',
                'benefit',
                'cost'
            ],
            "bobot" =>  [
                3,5,5,5,4,3
            ]
        ];
        foreach ($kriteria['nama'] as $key => $value) {
            Kriteria::factory()->create([
                'namakriteria'  =>  $value,
                'sifat'         =>  $kriteria['sifat'][$key],
                'bobot'         =>  $kriteria['bobot'][$key],
            ]);
        }
    }
}
