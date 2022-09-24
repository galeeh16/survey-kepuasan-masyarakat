<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Kuesioner;
use App\Models\Responden;
use App\Contracts\KuesionerContract;

final class KuesionerService implements KuesionerContract
{
    public function addResponden(
        $nama_responden,
        $jenis_kelamin,
        $pendidikan,
        $pekerjaan,
        $no_hp,
        $nik
    )
    {
        $responden = Responden::create([
            'nama_responden' => $nama_responden, 
            'jenis_kelamin' => $jenis_kelamin, 
            'pendidikan' => $pendidikan, 
            'pekerjaan' => $pekerjaan, 
            'no_hp' => $no_hp, 
            'nik' => $nik
        ]);

        return $responden;
    }

    public function addKuesioner(
        $id_responden,
        $id_layanan,
        array $answers
    ) 
    {
        $data_insert = [];

        foreach ($answers as $answer) {
            $explode_answer = explode('_', $answer);
            $id_pertanyaan = $explode_answer[0];
            $id_jawaban = $explode_answer[1];

            $data_insert[] = [
                'id_responden' => $id_responden,
                'id_layanan' => $id_layanan,
                'id_pertanyaan' => $id_pertanyaan,
                'id_jawaban' => $id_jawaban,
            ];
        }

        // lebih baik gunakan query builder untuk performa lebih baik
        Kuesioner::insert($data_insert);
    }
}