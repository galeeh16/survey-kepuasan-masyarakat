<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Pertanyaan;
use App\Contracts\PertanyaanContract;

final class PertanyaanService implements PertanyaanContract
{
    public function getAllPertanyaan() // tanpa pagination
    {
        return Pertanyaan::with('answers')->get();
    }

    public function getListPagination()
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;

        return Pertanyaan::paginate($limit)->toArray();
    }
}