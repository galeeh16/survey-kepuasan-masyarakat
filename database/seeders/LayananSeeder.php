<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_layanan')->insert([
            [
                'namalayanan' => 'AK1'
            ],
            [
                'namalayanan' => 'Rekom Passport'
            ],
            [
                'namalayanan' => 'Pelatihan'
            ],
            [
                'namalayanan' => 'LPK'
            ],
            [
                'namalayanan' => 'Pencatatan Perusahaan'
            ],
            [
                'namalayanan' => 'Perselisihan Hubungan Industrial'
            ],
        ]);
    }
}
