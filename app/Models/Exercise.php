<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public $timestamps = false;

    protected $table = 'exercises';

    public function trainings()
    {
        return $this->belongsTo(Training::class);
    }
}