<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Exercise;
use App\Models\PlannedTraining;
use App\Models\Team;
use App\Models\Exercise_Training;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index()
    {
        $plannedtrainings = PlannedTraining::orderBy('training_date', 'asc')->get();
        
        return view('dashboard', ['plannedtrainings' => $plannedtrainings]);
    }

    public function createtraining()
    {
        $exercises = Exercise::all();
        $teams = Team::all();
        return view('addtraining', ['exercises' => $exercises, 'teams' => $teams]);
    }

    public function addtraining(Request $request)
    {
        $training = new Training;
        $training->training_name = request('training-name');
        $training->training_duration = request('duration-time');
        $training->save();

        $newtraining = Training::orderby('id', 'desc')->first();

        $plannedtraining = new PlannedTraining;
        $plannedtraining->training_id = $newtraining->id;
        $plannedtraining->team_id = request('team');
        $plannedtraining->training_note = request('new-note');
        $plannedtraining->training_date = request('selected-date');
        $plannedtraining->save();

        for($i = 0; $i < count($request->input('show_option')); $i++)
        {
            $exercisetraining = new Exercise_Training;
            $exercisetraining->training_id = $newtraining->id;
            $exercisetraining->exercise_id = $request->input('show_option')[$i];
            $exercisetraining->save();
        }

        return redirect('/addtraining');
    }
}
