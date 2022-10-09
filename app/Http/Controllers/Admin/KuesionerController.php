<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Excel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\LayananContract;
use Illuminate\Support\Facades\DB;
use App\Contracts\KuesionerContract;
use App\Exports\ExportExcelFromView;
use App\Http\Controllers\Controller;
use App\Contracts\PertanyaanContract;

class KuesionerController extends Controller
{
    public function __construct(
        private KuesionerContract $kuesionerService,
        private PertanyaanContract $pertanyaanService,
        private LayananContract $layananService
    )
    {
        //
    }

    public function index(): View
    {
        $layanans = $this->layananService->dropdownLayanan();
        return view('admin.kuesioner.index', [
            'layanans' => $layanans
        ]);
    }

    public function getList(Request $request): JsonResponse 
    {
        $data = $this->kuesionerService->getListPagination();

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($data['total']),
            "recordsFiltered" => intval($data['total']),
            "data"            => $data['data']
        ];

        return response()->json($json_data, 200); 
    }

    public function show($id): View
    {
        $questions = $this->pertanyaanService->getAllPertanyaan();
        $responden_with_kuesioner = $this->kuesionerService->findRespondenById($id);

        return view('admin.kuesioner.show', [
            'responden' => $responden_with_kuesioner,
            'questions' => $questions
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, [
            'answers' => 'required|array',
            'answers.*' => 'required|string'
        ]);

        DB::beginTransaction();

        try {
            $this->kuesionerService->updateKuesionerByRespondenId($id, $request->answers);

            DB::commit();

            return response()->json([
                'message' => 'Berhasil mengubah kuesioner'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            
            return response()->json([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }

    }

    public function exportExcel(Request $request)
    {
        $date_from = $request->date_from;
        $date_to = $request->date_to;

        $data = $this->kuesionerService->getDataExcelExport($date_from, $date_to, $request->jenis_layanan);
        $respondens = [];

        // group by id_responden
        foreach ($data as $element) {
            $respondens[$element->id_responden][] = $element;
        }

        return Excel::download(new ExportExcelFromView(
            'admin.kuesioner.excel.result',
            [
                'respondens' => $respondens,
                'nama_layanan' => $request->nama_layanan,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
            ]
        ), 'Kuesioner.xlsx', \Maatwebsite\Excel\Excel::XLSX, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ]);
    }
}
