<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>

<table class = "table table striped">
  <thead>
    <th>Lesnummer</th>
    <th>Datum</th>
    <th>Instructeur</th>
    <th></th>
  </thead>
  <tbody>
    <?=$data['lessen']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
