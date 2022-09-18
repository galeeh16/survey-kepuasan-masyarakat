<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Contracts\PertanyaanContract;

class AK1Controller extends Controller
{
    public function __construct(private PertanyaanContract $service)
    {

    }
    public function index()
    {
        $questions = $this->service->getAllPertanyaan();
        
        return view('ak1.index', [
            'questions' => $questions
        ]);
    }
}
