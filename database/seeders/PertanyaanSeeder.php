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
                'pertanyaan' => 'Bagaimana Pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya.'
            ],
            [
                'pertanyaan' => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan.'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan.'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan.'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan',
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana.'
            ],
            [
                'pertanyaan' => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan.'
            ]
        ]);
    }
}
