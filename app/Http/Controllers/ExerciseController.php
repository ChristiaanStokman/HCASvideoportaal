<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function addexercises_training(Request $request)
    {   

        return redirect('/addtraining');
    }

    public function addexercises_exercise(Request $request)
    {
        return redirect('/addexercise');
    }
}
