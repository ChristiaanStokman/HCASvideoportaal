<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Exercise;
use App\Models\Plannedtraining;
use App\Models\Team;
use App\Models\exercise_training;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        
        return view('dashboard', ['trainings' => $trainings]);
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

        $plannedtraining = new Plannedtraining;
        $plannedtraining->training_id = $newtraining->id;
        $plannedtraining->team_id = request('team');
        $plannedtraining->training_note = request('new-note');
        $plannedtraining->training_date = request('selected-date');
        $plannedtraining->save();

        for($i = 0; $i < count($request->input('show_option')); $i++)
        {
            $exercisetraining = new exercise_training;
            $exercisetraining->training_id = $newtraining->id;
            $exercisetraining->exercise_id = $request->input('show_option')[$i];
            $exercisetraining->save();
        }

        return redirect('/addtraining');
    }
}
