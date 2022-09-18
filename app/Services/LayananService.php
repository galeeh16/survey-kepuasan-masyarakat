<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Layanan;
use App\Contracts\LayananContract;

class LayananService implements LayananContract
{
    public function getList(): array
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;

        return Layanan::paginate($limit)->toArray();
    }

    public function addLayanan(array $data)
    {
        return Layanan::create([
            'namalayanan' => $data['nama_layanan'],
            'deskripsi' => $data['deskripsi']
        ]);
    }

    public function deleteLayanan($id)
    {
        return Layanan::where('id', $id)->delete();
    }

    public function editLayanan(array $data)
    {
        return Layanan::where('id', $data['id'])
                ->update([
                    'namalayanan' => $data['nama_layanan'],
                    'deskripsi' => $data['deskripsi']
                ]);
    }
}