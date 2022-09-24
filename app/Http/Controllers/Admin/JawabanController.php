<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Contracts\JawabanContract;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JawabanController extends Controller
{
    public function __construct(private JawabanContract $service)
    {

    }

    public function index()
    {
        return view('admin.jawaban.index');
    }

    public function getList(Request $request): JsonResponse
    {
        $data = $this->service->getListPagination();

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($data['total']),
            "recordsFiltered" => intval($data['total']),
            "data"            => $data['data']
        );

        return response()->json($json_data, 200); 
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'kode' => 'required|string',
            'jawaban' => 'required|string',
            'nilai' => 'required|numeric',
        ]);

        try {
            $create = $this->service->addJawaban($request->all());

            return response()->json([
                'data' => $create,
                'message' => 'Sukses menambah jawaban'
            ], 201);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $this->validate($request, [
            'id_edit' => 'required',
            'kode_edit' => 'required|string',
            'jawaban_edit' => 'required|string',
            'nilai_edit' => 'required|numeric',
        ]);

        try {
            $create = $this->service->updateJawaban($request->all(), $id);

            return response()->json([
                'data' => $create,
                'message' => 'Sukses mengubah jawaban'
            ], 200);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function destroy($id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $this->service->deleteJawaban($id);

            DB::commit();
            return response()->json([
                'message' => 'Berhasil menghapus jawaban'
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
