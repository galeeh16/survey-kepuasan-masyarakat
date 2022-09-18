<?php

namespace App\Models;

use App\Models\Jawaban;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pertanyaan extends Model
{
    protected $table = 'tbl_pertanyaan';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Jawaban::class, 'pertanyaan_jawaban', 'pertanyaan_id', 'jawaban_id');
    }
}
