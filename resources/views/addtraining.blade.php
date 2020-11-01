<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="utf-8" />
        <title>HCAS - Plannen</title>
        <style>
            *{
                font-family: din-2014, sans-serif;
            }
            #exercises{
                overflow: scroll;
                height: 225px;
                width: 100%;
                overflow-x: hidden;
                /* border: 1px solid lightgray; */
            }
            .page-header{
                font-size: 30px;
                margin-bottom: -3px;
                font-weight: bold;
            }
            #banner{
                position: absolute;
                width: 100%;
                height: 175px;
                background-image: url("https://i.ibb.co/FKThNqp/hockey-banner.jpg");
                background-repeat: no-repeat;
                background-position: center;
                background-position: contain;
            }
            #header{
                position: relative;
                height: 175px;
                margin-bottom: 40px;
            }
            #header-content{
                color: white;
                position: absolute;
                bottom: 30px;
                left: 20px;
            }
            #form{
                width: 100%;
                padding-left: 20px;
                padding-right: 20px;
            }
            input, select, #exercises{
                min-width: 300px;
            }
            .input-label{
                font-size: 18px;
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }
            .form-block{
                border-bottom: 1px solid lightgray;
                padding-bottom: 15px;
                margin-bottom: 15px;
            }
            #btnsave{
                width: 100%;
                background-color: black;
                color: white;
                border-radius: 50px;
                height: 60px;
                margin-bottom: 20px;
                cursor: pointer;
            }
            .oefening{
                padding: 15px;
                background-color: #efefef;
                margin: 4px;
                border-radius: 5px;
                vertical-align: center;
                display: flex;
                align-items: center;
            }
            label{
                margin-bottom: 0;
            }
            #btnback{
                border: 0;
                font-size: 30px;
                background-color: transparent;
                background-image: url("https://www.materialui.co/materialIcons/navigation/arrow_back_grey_192x192.png");
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain;
                color: #aaaaaa;
                cursor: pointer;
                margin-left: 15px;
                margin-top: 10px;
                height: 40px;
                width: 40px;
            }
        </style>
    </head>
    <body>
        <div id="banner"></div>
        <div class="container">
            <div id="header">
                <button onclick="goBack()" id="btnback"></button>
                <div id="header-content">
                    <span class="page-header">Training plannen</span>
                </div>
            </div>
            <div id="form">
                <form method="post" action="/addtraining">
                    @csrf
                    <div class="form-block">
                        <span class="input-label">Naam training:</span>
                        <input type="text" name="training-name" required/>
                    </div>

                    <div class="form-block">
                        <span class="input-label">Oefeningen:</span>
                        <div id="exercises">
                            @if(count($exercises) > 0)
                                @foreach($exercises as $exercise)
                                    <div class="oefening">
                                        <input type="checkbox" value="{{$exercise->id}}" name="show_option[]" style="min-width: 25px;"/>
                                        <label>{{$exercise->exercise_name}}</label>
                                    </div>
                                @endforeach
                            @else
                                <p>Oefeningen ophalen mislukt.</p>
                            @endif
                            <!-- <button type="button" onclick="window.location='{{ url("/addexercise")}}'">+ Nieuwe oefening</button> -->
                        </div>
                    </div>

                    <div class="form-block">
                        <span class="input-label">Team:</span>
                        <select name="team" style="height: 29.31px;">
                            @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->team_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-block">
                        <span class="input-label">Datum:</span>
                        <input type="date" name="selected-date"/>
                    </div>

                    <div class="form-block">
                        <span class="input-label">Notitie:</span>
                        <input type="text" name="new-note"/>
                    </div>

                    <div class="form-block" style="border:0px;">
                        <span class="input-label">Trainingsduur</span>
                        <input type="number" name="duration-time"/>
                        <label style="font-style:italic; color:red;">*(In minuten)</label>
                    </div>

                    <input id="btnsave" type="submit" value="Opslaan"/>
                </form>
            </div>
        </div>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>
</html>