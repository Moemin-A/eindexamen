<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<a href="<?=URLROOT;?>/leerlingen/create">Mededeling toevoegen</a>
<table class = "table table-striped">
  <thead>
    <th>Naam</th>
    <th></th>
  </thead>
  <tbody>
    <?=$data['leerlingen']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
