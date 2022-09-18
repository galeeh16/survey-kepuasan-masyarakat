<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'tbl_layanan';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
