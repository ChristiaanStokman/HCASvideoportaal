<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public $timestamps = false;

    protected $table = 'trainings';

    public function plannedtraining()
    {
        return $this->hasMany(PlannedTraining::class);
    }
}


