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

}
