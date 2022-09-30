<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Contracts\PertanyaanContract;

class AK1Controller extends Controller
{
    public function __construct(
        private PertanyaanContract $pertanyaanService,
        private KuesionerContract $kuesionerService
    ) {
        //
    }
    public function index()
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();
        
        return view('ak1.index', [
            'questions' => $questions
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required|string|in:1,2',
            'nik' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'answers' => 'required|array'
        ]);

        DB::beginTransaction();

        try {
            $add_responden = $this->kuesionerService->addResponden(
                $request->nama_lengkap,
                $request->jenis_kelamin,
                $request->pendidikan,
                $request->pekerjaan,
                $request->no_hp,
                $request->nik,
                1
            );   

            $add_kuesioner = $this->kuesionerService->addKuesioner(
                $add_responden->id,
                1, // 1 = layanan AK1 (tbl_layanan)
                $request->answers
            );
            
            DB::commit();

            return response()->json([
                'message' => 'Proses berhasil'
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
