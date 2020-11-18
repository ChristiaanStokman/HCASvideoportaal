<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}" >
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dashboard.css') }}" >
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
        <title>HCAS - Dashboard</title>
        <style>
            *{
                font-family: din-2014, sans-serif;
            }
            h1{
                margin-bottom: -3px;
                font-weight: bold;
            }
            h5{
                color: gray;
            }
            #header{
                position:relative;
                height: 175px;
                margin-bottom: 40px;
            }
            #header-content{
                position: absolute;
                bottom: 0;
                left: 0;
            }
            .navbar{
                position: fixed; 
                bottom:0px; 
                width:100%;
                background-color:#eeeeee;
            }
            .navbar-brand{
                width:50%; 
                margin:15px 0px; 
                text-align: center;
                min-width:120px;
                font-weight:bold;
                font-size: 15px;
            }
            .icon{
                width: 30px;
                height: 30px;
                margin-bottom: 5px;
            }
            #icon-button{
                position: fixed;
                left:50%;
                margin-left:-40px;
                bottom: 73px;
                background-color: #f47720;
                padding:2.5px 25.5px;
                font-size:50px;
                border-radius:50px;
                color: white;
                box-shadow: 0px 2px 8px gray;
            }
            a:hover{
                text-decoration: none;
            }
            #training-box{
                background-color: #eeeeee;
                padding: 15px;
                margin: 5px 0px 20px 0px;
                min-height: 100px;
                display: flex;
                flex-direction: row;
                cursor: pointer;
                transition: 0.3s;
            }
            #training-box:hover{
                background-color: #dedede;
                transition: 0.3s;
            }
            .right-column{
                width: 25%;
                margin:auto;
                text-align: center;
            }
            .left-column{
                width: 75%;
                display: flex;
                flex-direction: column;
            }
            #t_name{
                position:relative;
                font-weight: bold;
                font-size: 22px;
            }
            #t_date{
                font-weight: bold;
                font-size: 22px;
            }
            #t_team{
                position:relative;
                color: gray;
                line-height:0.8;
            }
            #t_duration{
                font-weight: bold;
                font-size: 26px;
            }
            #t_duration_desc{
                font-weight: normal;
                font-size: 16px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <div id="header-content">
                    <h1>Dashboard</h1>
                    <h5>Mijn komende trainingen</h5>
                </div>
            </div>
            @if(count($plannedtrainings) > 0)
            <div id="planning">
                @foreach ($plannedtrainings as $plannedtraining)
                    @if($plannedtraining->training_date >= date('Y-m-d'))
                        <span id="t_date"> 
                            @if($plannedtraining->training_date == date('Y-m-d'))
                                Vandaag
                            @elseif($plannedtraining->training_date == date('Y-m-d', strtotime('tomorrow')))
                                Morgen
                            @else
                                {{ date('l j F', strtotime($plannedtraining->training_date)) }}
                            @endif
                        </span>
                        <div id="training-box" data-toggle="modal" data-target="#exampleModalCenter" data-trainingname="{{ $plannedtraining->training->training_name }}">
                            <div class="left-column">
                                <span id="t_name"> {{ $plannedtraining->training->training_name }}</span>
                                <span id="t_team"> {{ $plannedtraining->team->team_name }}</span>
                            </div>
                            <div class="right-column">
                                <span id="t_duration"> 
                                    {{ $plannedtraining->training->training_duration }} 
                                    <span id="t_duration_desc">
                                        Minuten
                                    </span>
                                </span>
                            </div>
                        </div>
                    @else
                    @endif
                @endforeach
            </div>
            @else
                Er zijn geen trainingen.
            @endif
        </div>
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="#">
                <img src="https://www.flaticon.com/svg/static/icons/svg/177/177413.svg" class="icon" class="d-inline-block align-top" alt="">
                </br>
                Oefeningen
            </a>
            <a class="navbar-brand" href="#">
                <img src="https://www.flaticon.com/svg/static/icons/svg/1865/1865318.svg" class="icon" class="d-inline-block align-top" alt="">
                </br>
                Trainingen
            </a>
        </nav>
        <a id="icon-button" href="addtraining">
            +
        </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Training naam</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Training details
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#exampleModalCenter').on('show.bs.modal', function () {
            
            var title = $(event.relatedTarget).data('trainingname')
        
            $('#exampleModalLongTitle').text(title);

            });
        </script>
    </body>
</html>