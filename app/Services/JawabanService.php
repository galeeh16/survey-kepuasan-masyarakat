<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Jawaban;
use App\Contracts\JawabanContract;

final class JawabanService implements JawabanContract
{
    public function getListPagination()
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;
        
        return Jawaban::paginate($limit)->toArray();
    }
}