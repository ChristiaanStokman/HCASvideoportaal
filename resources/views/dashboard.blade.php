<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
        <title>HCAS - Dashboard</title>
    </head>
    <body>
        <img class="logo" src="/img/hcas logo-def.png"/>
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
                        <div id="training-box" data-toggle="modal" data-target="#trainingDetailsModal" data-trainingname="{{ $plannedtraining->training->training_name }}">
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
        <div class="modal fade" id="trainingDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            $('#trainingDetailsModal').on('show.bs.modal', function (event) {
                var button  = $(event.relatedTarget)
                var title = button.data('trainingname')
                var modal = $(this)
                
                modal.find('.modal-title').text(title)
            })
        </script>
    </body>
</html>