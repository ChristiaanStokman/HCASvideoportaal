<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plannedtraining extends Model
{
    public $timestamps = false;

    protected $table = 'plannedtrainings';

    public function team()
    {
        return $this->hasOne(Team::class);
    }
    public function training()
    {
        return $this->hasOne(Training::class);  
    }
}