<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Artikel Toevoegen</title>

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
            include("./instructeur-navbar.php");
            ?>
        </ul>
    </div>

    <div class="main_content">
    
    <div class="container">
    <div class="col-12" id="header-text" style="border-bottom-style:hidden; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Les Inplannen</center>
            </h1>
    </div>
    <center>
        <!-- Alle labels om artikelen toe te voegen aan geleend.php via insertcontroller -->
    <form method="post" action="/LesPlanning/insertLes">
    <div class="col-12 col-sm-4">
    
        <tr>
            <td>
                <label for="leerling">Klant:</label><br>
                <select name="leerlingid" id="leerlingid">
                <option value="1">Moemin</option>
                <option value="2">Hans</option>
                </select><br><br>
            </td>
        </tr> 
        <tr>
            <td>
                <?php date_default_timezone_set('Europe/Amsterdam'); ?>
                <label for="dt">Datum en Tijd:</label><br>
                <input type="datetime-local" id="datumentijd" name="datumentijd"  min="09:00" max="18:00" value="<?= $data['datumentijd']; ?>"><br><br>
                <div><?= $data['datumentijdError']; ?></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prs">Ophaaladres</label><br>
                <input type="text" id="adres" name="adres" value="<?= $data['adres']; ?>"><br><br>
                <div><?= $data['adresError']; ?></div>
          </td>
        </tr>
        <tr>
            <td>
                <label for="prs">Lesdoel</label><br>
                <input type="text" id="lesdoel" name="lesdoel" value="<?= $data['lesdoel']; ?>"><br><br>
                <div><?= $data['lesdoelError']; ?></div>
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