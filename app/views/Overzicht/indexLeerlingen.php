<br>
<h3>Leerlingen overzicht</h3>

<a class="btn btn-primary float-end" href="<?=URLROOT; ?>/Overzicht/indexInstructeurs" role="button" id="btn1">Instructeurs overzicht</a>
<a class="btn btn-primary float-end" href="<?=URLROOT; ?>/Overzicht/index" role="button" id="btn2">Algemene overzicht</a>


<br>
<table class="table table-dark table-striped">
<br>
  <thead>
    <th scope="col">Voornaam</th>
    <th scope="col">Tussenvoegsel</th>
    <th scope="col">Achternaam</th>
    <th scope="col">Adres</th>
    <th scope="col">Woonplaats</th>
    <th scope="col">Rol</th>
    <th scope="col"></th>


  </thead>
  <tbody>
    <?=$data['records']?>
  </tbody>
</table>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
   
    <title></title>
  </head>
  <body>

       

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>