<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>

<table class = "table table striped">
  <thead>
    <th>Les</th>
    <th>Onderwerp</th>
  </thead>
  <tbody>
    <?=$data['lessen1']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
