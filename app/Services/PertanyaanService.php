<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Pertanyaan;
use Illuminate\Support\Facades\DB;
use App\Contracts\PertanyaanContract;

final class PertanyaanService implements PertanyaanContract
{
    public function getAllPertanyaan() // tanpa pagination
    {
        return Pertanyaan::with('answers')->get();
    }

    public function getListPagination()
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;

        return Pertanyaan::paginate($limit)->toArray();
    }

    public function insertDataPertanyaan(string $pertanyaan, array $jawaban)
    {
        $pertanyaan =  Pertanyaan::create([
            'pertanyaan' => $pertanyaan
        ]);

        $this->insertDataPertanyaanJawaban($pertanyaan->id, $jawaban);

        return $pertanyaan;
    }

    private function insertDataPertanyaanJawaban($pertanyaan_id, array $jawaban)
    {
        $data_insert = [];
        foreach ($jawaban as $row) {
            $data_insert[] = [
                'pertanyaan_id' => $pertanyaan_id,
                'jawaban_id' => intval($row)
            ];
        }

        DB::table('pertanyaan_jawaban')->insert($data_insert);
    }

    public function getPertanyaanById($id)
    {
        return Pertanyaan::where('id', $id)->first();
    }

    public function getPertanyaanJawaban($id)
    {
        return DB::table('pertanyaan_jawaban')->where('pertanyaan_id', $id)->get()->pluck('jawaban_id');
    }

    public function updatePertanyaanById($pertanyaan_id, $pertanyaan)
    {
        return Pertanyaan::where('id', $pertanyaan_id)
                ->update([
                    'pertanyaan' => $pertanyaan
                ]);
    }

    public function updateJawaban($pertanyaan_id, array $jawabans)
    {
        DB::table('pertanyaan_jawaban')
            ->where('pertanyaan_id', $pertanyaan_id)
            ->delete();

        $data_insert = [];
        foreach ($jawabans as $jawaban) {
            $data_insert[] = [
                'pertanyaan_id' => $pertanyaan_id,
                'jawaban_id' => $jawaban
            ];            
        }

        DB::table('pertanyaan_jawaban')->insert($data_insert);
    }

    public function deletePertanyaanById($pertanyaan_id)
    {
        return Pertanyaan::where('id', $pertanyaan_id)->delete();
    }

    public function deletePertanyaanJawaban($pertanyaan_id)
    {
        return DB::table('pertanyaan_jawaban')
                ->where('pertanyaan_id', $pertanyaan_id)
                ->delete();
    }
}