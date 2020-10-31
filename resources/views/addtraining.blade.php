<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="utf-8" />
        <title>Training toevoegen</title>
        <style>
            #exercises{
                overflow: scroll;
                height: 200px;
                width: 30%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <div id="header-content">
                    <h1>Training toevoegen</h1>
                </div>
            </div>
            <div id="forum">
                <form method="post" action="/addtraining">
                    @csrf
                    <h4>Naam training:</h4>
                    <input type="text" name="training-name"/>

                    <h4>Oefeningen:</h4>
                    <div id="exercises">
                        @if(count($exercises) > 0)
                            @foreach($exercises as $exercise)
                                <input type="checkbox" value="{{$exercise->id}}" name="show_option[]" />
                                <label>{{$exercise->exercise_name}}</label>
                                <br/>
                            @endforeach
                        @else
                            <h2>Oefeningen kunnen niet opgehaald worden.</h2>
                        @endif
                        <button type="button" onclick="window.location='{{ url("/addexercise")}}'">+ Nieuwe oefening</button>
                    </div>

                    <h4>Team:</h4>
                    <select name="team">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->team_name}}</option>
                        @endforeach
                    </select>

                    <h4>Datum:</h4>
                    <input type="date" name="selected-date"/>

                    <h4>Notitie:</h4>
                    <input type="text" name="new-note"/>

                    <h4>Trainingsduur</h4>
                    <input type="time" name="duration-time"/>
                    <label style="font-style:italic; color:red;">*(In uren en minuten)</label>
                    <br/>
                    <input type="submit" value="SAVE"/>
                </form>
            </div>
        </div>
    </body>
</html>