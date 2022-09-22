<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Contracts\PertanyaanContract;

class PertanyaanController extends Controller
{
    public function __construct(private PertanyaanContract $service)
    {

    }

    public function index()
    {
        $jawabans = DB::table('tbl_jawaban')->get();
        return view('admin.pertanyaan.index', ['jawabans' => $jawabans]);
    }

    public function getList(Request $request)
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|array',
        ]);

        DB::beginTransaction();
        
        try {
            $this->service->insertDataPertanyaan($request->pertanyaan, $request->jawaban);
            DB::commit();

            return response()->success(message: 'Berhasil menambah pertanyaan', status: 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function show($id)
    {
        $pertanyaan = $this->service->getPertanyaanById($id);
        $pertanyaan_jawaban = $this->service->getPertanyaanJawaban($id);

        return response()->json([
            'pertanyaan' => $pertanyaan,
            'jawaban' => $pertanyaan_jawaban
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $update = $this->service->updatePertanyaanById($id, $request->pertanyaan_edit);

            $update_jawaban = $this->service->updateJawaban($id, $request->edit_jawaban);

            DB::commit();

            return response()->success(message: 'Sukses update pertanyaan', status: 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $this->service->deletePertanyaanById($id);
            
            $this->service->deletePertanyaanJawaban($id);

            DB::commit();
            return response()->success(message: 'Sukses menghapus pertanyaan', status: 200);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
