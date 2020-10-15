<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dashboard.css') }}" >
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
        <div id="planning">

        </div>
    </div>
    <nav class="navbar navbar-light bg-light">
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
    <a id="icon-button" href="#">
        +
    </a>
</body>
</html>