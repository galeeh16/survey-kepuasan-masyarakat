<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_pertanyaan')->insert([
            [
                'unsur' => 'U1',
                'no_urut' => 1,
                'pertanyaan' => 'Bagaimana Pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya.'
            ],
            [
                'unsur' => 'U2',
                'no_urut' => 2,
                'pertanyaan' => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.'
            ],
            [
                'unsur' => 'U3',
                'no_urut' => 3,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan.'
            ],
            [
                'unsur' => 'U4',
                'no_urut' => 4,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan.'
            ],
            [
                'unsur' => 'U5',
                'no_urut' => 5,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan.'
            ],
            [
                'unsur' => 'U6',
                'no_urut' => 6,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan',
            ],
            [
                'unsur' => 'U7',
                'no_urut' => 7,
                'pertanyaan' => 'Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan'
            ],
            [
                'unsur' => 'U8',
                'no_urut' => 8,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana.'
            ],
            [
                'unsur' => 'U9',
                'no_urut' => 9,
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan.'
            ]
        ]);
    }
}
