<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/showtraining.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCAS - Training bekijken</title>
</head>
<body>
    <div id="banner"></div>
    <img class="logo" src="/img/hcas logo-def_white.png"/>
    <div class="container">
        <div id="header">
            <button onclick="goBack()" id="btnback"></button>
            <div id="header-content">
                <span class="page-header">{{$plannedtraining->training->training_name}}</span>
            </div>
        </div>
        <div class="training-info">
            <div class="row">
                <div class="col-sm">
                    <!-- <span id="t_date">{{$plannedtraining->training_date}}</span> -->
                    <span id="t_date_day">{{ date('d', strtotime($plannedtraining->training_date)) }}</span><br>
                    <span id="t_date_month">{{ date('F', strtotime($plannedtraining->training_date)) }}</span>
                </div>
                <div class="col-sm">
                    <span id="t_duration">
                        {{$plannedtraining->training->training_duration}}
                        <span id="t_duration_desc">
                            Minuten
                        </span>
                    </span>
                </div>
                <div class="col-sm">
                    <span id="t_team">{{$plannedtraining->team->team_name}}</span>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>