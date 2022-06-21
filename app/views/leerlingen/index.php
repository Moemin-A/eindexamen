<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<table class ="table table-striped">
  <thead>
    <th>Instructeur naam</th>
    <th>Rijles Datum</th>
    <th>Ophaaladres</th>
    <th>Lesdoel</th>
    <th>Commentaar</th>
    <th>Examen informatie</th>
    <th>Tegoed</th>
    <th></th>
  </thead>
  <tbody>
    <?=$data['leerlingen']?>
  </tbody>
</table>
<div>
<a class="btn btn-outline-dark" href="/homepages/index" role="button";>Rijlessenoverzicht</a>
</div>
<?php 
  require APPROOT . '/views/includes/footer.php';
?>
