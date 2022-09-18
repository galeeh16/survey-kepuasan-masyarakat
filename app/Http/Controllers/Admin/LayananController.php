<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\LayananService;
use Illuminate\Http\JsonResponse;
use App\Contracts\LayananContract;
use App\Http\Controllers\Controller;

class LayananController extends Controller
{
    public function __construct(private LayananContract $service) 
    {

    }

    public function index()
    {
        return view('admin.layanan.index');
    }

    public function getList(Request $request)
    {
        $data = $this->service->getList();

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
            'nama_layanan' => 'required|string|min:3|max:50',
            'deskripsi' => 'nullable|string|min:3|max:255'
        ]);

        try {
            $add = $this->service->addLayanan($request->all());
            return response()->success($add, status: 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function delete(Request $request): JsonResponse
    {
        try {
            $delete = $this->service->deleteLayanan($request->id);
            return response()->success(message: 'Berhasil menghapus layanan');
        } catch (\Exception $e) {
            return response()->error();
        }
    }

    public function edit(Request $request): JsonResponse
    {   
        $this->validate($request, [
            'id' => 'required|numeric',
            'nama_layanan' => 'required|string|min:3|max:50',
            'deskripsi' => 'nullable|string|min:3|max:255'
        ]);

        try {
            $edit = $this->service->editLayanan($request->all());

            return response()->success(message: 'Sukses update layanan');
        } catch (\Exception $e) {
            return response()->error();
        }
    }
}
