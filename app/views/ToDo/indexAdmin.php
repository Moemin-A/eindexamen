<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php 
    if(!empty($data["alert"])){
        echo $data["alert"];
        header("Refresh: 2; url=" . URLROOT. "/ToDo/indexAdmin");
    }
    ?>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">omschrijvinggg</th>
            <th scope="col">AantalInBeschikking</th>
            <th scope="col">AantalInLeen</th>
            <th scope="col">Catogorie Naam</th>
            <th scope="col">CatogorieId</th>
                <br>
                <a class="btn btn-primary float-end" href="<?=URLROOT; ?>/ToDo/index" role="button">Algemene Overzicht</a>
            </tr>
        </thead>
        <tbody>
            <?= $data["records"] ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>