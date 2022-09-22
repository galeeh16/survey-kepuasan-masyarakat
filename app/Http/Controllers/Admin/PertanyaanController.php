<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\PertanyaanContract;

class PertanyaanController extends Controller
{
    public function __construct(private PertanyaanContract $service)
    {

    }

    public function index()
    {
        return view('admin.pertanyaan.index');
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
}
