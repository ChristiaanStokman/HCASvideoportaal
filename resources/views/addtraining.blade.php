<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/addtraining.css">
        <meta charset="utf-8" />
        <title>HCAS - Plannen</title>
    </head>
    <body>
        <div id="banner"></div>
        <img class="logo" src="/img/hcas logo-def_white.png"/>
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
                                        <label><b>{{$exercise->exercise_name}}</b></label>
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
                            <option selected disabled>Selecteer een team...</option>
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
                        <span class="input-label">Trainingsduur:</span>
                        <input type="number" name="duration-time"/>
                        <label style="font-style:italic; color:red;">*(In minuten)</label>
                    </div>

                    <input id="btnsave" type="submit" value="Opslaan"/>
                </form>
            </div>
        </div>

        <!-- Modal Succes -->
        <div class="modal fade" id="succesSave" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Succesvol Opgeslagen!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        De nieuwe training is succesvol opgeslagen. Nog een training aanmaken?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Ja</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="goBack()">Nee</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Error -->
        <div class="modal fade" id="errorSave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Fout bij opslaan!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Er is een fout opgetreden bij het opslaan. Probeer het later opnieuw!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($_POST["SubmitTraining"]))
            @if($result == true)
                <script>
                    $('#succesSave').modal('show');
                </script>
            @else
                <script>
                    $('#errorSave').modal('show');
                </script>
            @endif
        @endif

        <script>
            function goBack() {
                window.location.assign("./");
            }
        </script>
    </body>
</html>