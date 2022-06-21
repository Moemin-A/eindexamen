<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leerling-Pagina</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>




<body>

    <!-- Startup intro -->
    <div class="intro">
      <h1 class="banner-header">
          <span class="banner">Rijschool</span>
      </h1>
    </div>

    <!-- navbar wordt aangeroepen -->
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <?php
                include("./leerling-navbar.php");
                ?>
            </ul>
        </div>


        <div class="main_content">
        <center>
            <div class="header" style="font-size:30px;">Welkom Konijn!</div>
            <div class="info"></center>

                
                <div style="text-align:center; height:150px; pointer-events: none; cursor: default">
                    <iframe src="https://free.timeanddate.com/clock/i879pplp/n1310/fs24/tt0/tw0/tm1/ts1/tb4" frameborder="0" width="147" height="57"></iframe>

                <!-- één knop wordt gemaakt waarmee je naar de Leerling-Pagina navigeren -->
                </div>
                <div class="main_content">
             
                <div class="wrapper" style="padding-top:50px;">
                    <li><a href="/les"><button class="name noselect">Leerling Pagina</button>
                    <div class="info"> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="app.js"></script>

</html>