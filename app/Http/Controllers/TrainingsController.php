<?php

namespace App\Http\Controllers;

use App\Models\PlannedTraining;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index()
    {
        $plannedtrainings = PlannedTraining::orderBy('training_date', 'asc')->get();
        
        return view('dashboard', ['plannedtrainings' => $plannedtrainings]);
    }
}
