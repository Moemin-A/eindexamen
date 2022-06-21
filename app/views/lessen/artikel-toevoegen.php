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
            include("./leerling-navbar.php");
            ?>
        </ul>
    </div>

    <div class="main_content">
    
    <div class="container">
    <div class="col-12" id="header-text" style="border-bottom-style:hidden; ">
    <h1 style="padding-bottom: 50px; padding-top: 50px;">
                <center> Artikel Toevoegen</center>
            </h1>
    </div>
    <center>
        <!-- Alle labels om artikelen toe te voegen aan geleend.php via insertcontroller -->
    <form method="post" action="/artikels/insertaanvraag">
    <div class="col-12 col-sm-4">
        <tr>
            <td>
                <label for="omschrijving">Omschrijving:</label><br>
                <input type="text" id="omschrijving" name="omschrijving" value="<?= $data['omschrijving']; ?>"><br><br>
                <div><?= $data['omschrijvingError']; ?></div>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="categorie">Categorie:</label><br>
                <select name="categorieid" id="categorieid">
                <option value="1">Elektronica</option>
                <option value="2">Studieboeken</option>
                <option value="3">Keuzedeel Producten</option>
                <option value="4">Schoolmaterialen</option>
                </select><br><br>
            </td>
        </tr> 
        <tr>
            <td>
                <label for="tgl">Tijd Geleend</label><br>
                <input type="time" id="tijdgeleend" name="tijdgeleend"  min="09:00" max="18:00" value="<?= $data['tijdgeleend']; ?>"><br><br>
                <div><?= $data['tijdgeleendError']; ?></div>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prs">Persoon</label><br>
                <input type="number" id="persoon" name="persoon" value="<?= $data['persoon']; ?>"><br><br>
                <div><?= $data['persoonError']; ?></div>
          </td>
        </tr>
             </td>
        <td>
        <!-- <input type="hidden" name="id" value=""><br> -->
        <tr>
            <td>
                <input type="submit" name="submit" value="Submit">
          </td>
        </tr>
    </form> </center>
    <div class="info">
    </div>
    </body>

</html>