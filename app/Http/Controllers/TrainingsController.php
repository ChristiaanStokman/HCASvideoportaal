<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index()
    {
        $trainings = Training::all();

        return view('dashboard', ['trainings' => $trainings]);
    }
}
