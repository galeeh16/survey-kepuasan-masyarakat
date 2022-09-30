<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\KuesionerContract;
use App\Http\Controllers\Controller;
use App\Contracts\PertanyaanContract;

class KuesionerController extends Controller
{
    public function __construct(
        private KuesionerContract $service,
        private PertanyaanContract $pertanyaanService
    )
    {
        //
    }

    public function index()
    {
        return view('admin.kuesioner.index');
    }

    public function getList(Request $request): JsonResponse 
    {
        $data = $this->service->getListPagination();

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($data['total']),
            "recordsFiltered" => intval($data['total']),
            "data"            => $data['data']
        ];

        return response()->json($json_data, 200); 
    }

    public function show($id)
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();
        $responden_with_kuesioner = $this->service->findRespondenById($id);

        // dd($responden_with_kuesioner->toArray());

        return view('admin.kuesioner.show', [
            'responden' => $responden_with_kuesioner,
            'questions' => $questions
        ]);
    }
}
