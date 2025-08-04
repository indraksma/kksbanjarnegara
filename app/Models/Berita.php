<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $guarded = [];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
