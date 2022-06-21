<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LeerlingPagina</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>

<div class="wrapper">
    <div class="sidebar">
        <ul>
            <?php
            include("./leerling-navbar.php");
            ?>
        </ul>
    </div>
    
    <div class="main_content">
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="border-bottom-style: solid; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Leerling Pagina </center>
            </h1>
    </div>
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="col-12" id="header-text" style="">
    </div>

      <center> <table class="table table-striped">
        <!-- Alle records aanroepen bij de labels -->
  <thead>
    <tr>
      <th scope="col">Datum</th>
      <th scope="col">Onderdeel</th>
    </tr>
  </thead>
  <tbody>
  <?php echo $data['records1']; ?>
  </tbody>
</table> </center>

</table>
    <div class="info">
</div>
<form method="get" action="/Les/insertOpmerking">
    <button type="submit">Opmerking Toevoegen</button>
</form>
</div>

    </body>
    <script src="app.js"></script>

</html>