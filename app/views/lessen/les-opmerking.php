<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Opmerking Toevoegen</title>

    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div class="col-12" id="header-text" style="border-bottom-style:hidden; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Opmerking Toevoegen</center>
            </h1>
    </div>
    <center>
        <!-- Alle labels om een opmerking toe te voegen via les.php controller -->
    <form method="post" action="/Les/insertOpmerking">
    <div class="col-12 col-sm-4">
    
        <tr>
            <td>
                <label for="les">Les:</label><br>
                <select name="lesid" id="lesid">
                <option value="42">2022-06-11</option>
                <option value="43">2022-06-14</option>
                <option value="44">2022-06-16</option>
                <option value="47">2022-06-20</option>
                <option value="48">2022-06-21</option>
                <option value="49">2022-06-22</option>
                </select><br><br>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="opm">Opmerking</label><br>
                <input type="text" id="opmerking" name="opmerking" value="<?= $data['opmerking']; ?>"><br><br>
                <div><?= $data['opmerkingError']; ?></div>
          </td>
        </tr>
             </td>
        <td>
        <!-- <input type="hidden" name="id" value=""><br> -->
        <tr>
            <td>
                <input type="submit" name="submit" value="Inplannen">
          </td>
        </tr>
    </form> </center>
    <div class="info">
    </div>
    </body>

</html>