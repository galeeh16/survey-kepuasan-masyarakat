<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Jawaban;
use App\Contracts\JawabanContract;
use Illuminate\Support\Facades\DB;

final class JawabanService implements JawabanContract
{
    public function getListPagination()
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;
        
        return Jawaban::paginate($limit)->toArray();
    }

    public function addJawaban(array $data)
    {
        return Jawaban::create([
            'kode' => $data['kode'],
            'jawaban' => $data['jawaban'],
            'nilai' => $data['nilai'],
        ]);
    }

    public function updateJawaban(array $data, $id)
    {
        return Jawaban::where('id', $id)
            ->update([
                'kode' => $data['kode_edit'],
                'jawaban' => $data['jawaban_edit'],
                'nilai' => $data['nilai_edit'],
            ]);   
    }

    public function deleteJawaban($id)
    {
        $this->deleteJawabanPertanyaan($id);

        Jawaban::where('id', $id)->delete();
    }

    private function deleteJawabanPertanyaan($jawaban_id): void
    {
        DB::table('pertanyaan_jawaban')->where('jawaban_id', $jawaban_id)->delete();
    }

}