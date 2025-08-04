<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $guarded = [];

    public function step()
    {
        return $this->belongsTo(Step::class);
    }
}
