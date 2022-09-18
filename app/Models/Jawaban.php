<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'tbl_jawaban';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
