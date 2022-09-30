<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\Kuesioner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Responden extends Model
{
    protected $table = 'tbl_responden';

    protected $guarded = [];

    public $timestamps = false;

    public function kuesioners(): HasMany
    {
        return $this->hasMany(Kuesioner::class, 'id_responden', 'id');
    }

    public function layanan(): HasOne
    {
        return $this->hasOne(Layanan::class, 'id', 'id_layanan');
    }
}
