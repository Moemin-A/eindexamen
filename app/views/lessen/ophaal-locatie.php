<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ophaal Locatie Wijzigen</title>

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
                <center> Ophaal Locatie Wijzigen</center>
            </h1>
    </div>
    <center>
        <!-- Alle labels om een opmerking toe te voegen via les.php controller -->
    <form method="post" action="/Les/insertWijziging">
    <div class="col-12 col-sm-4">
    
        <tr>
            <td>
                <label for="les">Les:</label><br>
                <select name="lesid" id="lesid">
                <option value="55">2022-06-24</option>
                <option value="56">2022-06-28 </option>
                </select><br><br>
                <div><?= $data['lesidError']; ?></div>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="str">Straat</label><br>
                <input type="text" id="straat" name="straat" value="<?= $data['straat']; ?>"><br><br>
                <div><?= $data['straatError']; ?></div>
          </td>
        </tr>
        <tr>
            <td>
                <label for="wnp">Woonplaats</label><br>
                <input type="text" id="woonplaats" name="woonplaats" value="<?= $data['woonplaats']; ?>"><br><br>
                <div><?= $data['woonplaatsError']; ?></div>
          </td>
        </tr>
             </td>
        <td>
        <!-- <input type="hidden" name="id" value=""><br> -->
        <tr>
            <td>
                <input type="submit" name="submit" value="OK">
          </td>
        </tr>
    </form> </center>
    <div class="info">
    </div>
    </body>

</html>