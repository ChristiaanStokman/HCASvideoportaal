<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannedTraining extends Model
{
    protected $table = 'plannedtrainings';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
