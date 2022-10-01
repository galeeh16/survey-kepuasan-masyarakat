<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Kuesioner;
use App\Models\Responden;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;

final class KuesionerService implements KuesionerContract
{
    public function addResponden(
        $nama_responden,
        $jenis_kelamin,
        $pendidikan,
        $pekerjaan,
        $no_hp,
        $nik,
        $id_layanan,
    )
    {
        $responden = Responden::create([
            'nama_responden' => $nama_responden, 
            'jenis_kelamin' => $jenis_kelamin, 
            'pendidikan' => $pendidikan, 
            'pekerjaan' => $pekerjaan, 
            'no_hp' => $no_hp, 
            'nik' => $nik,
            'id_layanan' => $id_layanan
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

    public function getListPagination()
    {
        $length = request('length') ? intval(request('length')) : 10;

        return Responden::with(['layanan'])
            ->when(request('search') && request('search') != '', function($query) {
                return $query->where(DB::raw('lower(nama_responden)'), 'like', '%'. strtolower(request('search')) .'%')
                            ->orWhere('nik', 'like', '%'. request('search') .'%')
                            ->orWhere('no_hp', 'like', '%'. request('search') .'%');
            })
            ->when(request('layanan') && request('layanan') != '', function($query) {
                return $query->where('id_layanan', request('layanan'));
            })
            ->when(request('date_from') && request('date_to'), function($query) {
                $from = date('Y-m-d', strtotime(request('date_from')));
                $to = date('Y-m-d', strtotime(request('date_to')));

                return $query->whereBetween('created_at', [$from, $to]);
            })
            ->paginate($length)
            ->toArray();
    }

    public function findRespondenById($id)
    {
        return Responden::with(['layanan', 'kuesioners'])
                ->where('id', $id)
                ->first(); 
    }

    public function updateKuesionerByRespondenId($id_responden, array $answers)
    {
        foreach ($answers as $answer) {
            $explode_answer = explode('_', $answer);
            $id_pertanyaan = $explode_answer[0];
            $id_jawaban = $explode_answer[1];
            $id_kuesioner = $explode_answer[2];

            DB::table('tbl_kuesioner')
                ->where('id', $id_kuesioner)
                ->update([
                    'id_jawaban' => $id_jawaban
                ]);
        }
    }
}