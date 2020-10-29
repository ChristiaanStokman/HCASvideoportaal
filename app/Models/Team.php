<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    public function trainings()
    {
        return $this->hasMany(Training::class)->orderBy('training_date');
    }
}
