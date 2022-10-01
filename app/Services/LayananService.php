<?php 

declare(strict_types=1);

namespace App\Services;

use App\Models\Layanan;
use App\Contracts\LayananContract;
use Illuminate\Support\Facades\Cache;

class LayananService implements LayananContract
{
    private $cache_name = 'dropdown_layanan';

    private function forgetCache()
    {
        Cache::forget($this->cache_name);
    }

    public function getList(): array
    {
        $search = request()->get('search') ? strtolower(request()->get('search')) : null;
        $limit = request()->input('length') ? request()->input('length') : 0;

        return Layanan::paginate($limit)->toArray();
    }

    public function dropdownLayanan()
    {
        return Cache::remember($this->cache_name, $ttl=3600, function() {
            return Layanan::all();
        }); 
    }

    public function addLayanan(array $data)
    {
        $create = Layanan::create([
            'namalayanan' => $data['nama_layanan'],
            'deskripsi' => $data['deskripsi']
        ]);

        $this->forgetCache();
        return $create;
    }

    public function deleteLayanan($id)
    {
        $this->forgetCache();
        return Layanan::where('id', $id)->delete();
    }

    public function editLayanan(array $data)
    {
        $update = Layanan::where('id', $data['id'])
                ->update([
                    'namalayanan' => $data['nama_layanan'],
                    'deskripsi' => $data['deskripsi']
                ]);

        $this->forgetCache();
        return $update;
    }
}