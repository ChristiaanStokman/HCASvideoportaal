<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    protected $table = 'teams';

    public function plannedtrainings()
    {
        return $this->belongsTo(Plannedtraining::class);
    }
}