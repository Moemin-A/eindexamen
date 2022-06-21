<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<a href="<?=URLROOT;?>/instructeurs/create">Mededeling sturen</a>
<table class = "table table-striped">
  <thead>
    <th>Naam</th>
    <th>Telefoonnummer</th>
    <th>Geslacht</th>
    <th></th>
  </thead>
  <tbody>
    <?=$data['instructeurs']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
