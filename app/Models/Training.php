<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';

    public function plannedTrainings()
    {
        return $this->hasMany(PlannedTraining::class);
    }
}
