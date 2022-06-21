<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>

<form action="<?= URLROOT; ?>/instructeurs/create" method="post">
  <table>
    <tbody>
      <tr>        
        <td>
          <label class= "form-label" for="instructeur">Instructeur</label>
          <input class="form-control" type="text" name="instructeur" id="instructeur" value="<?= $data['instructeur']; ?>">
          <div class="errorForm"><?= $data['instructeurError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label class= "form-label" for="mededelingen">Mededelingen</label>
          <input class="form-control" type="text" name="mededelingen" id="mededelingen" value="<?= $data['mededelingen']; ?>">
          <div class="errorForm"><?= $data['mededelingenError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Verzenden">
        </td>
      </tr>
    </tbody>
  </table>

</form>

<?php
  require APPROOT . '/views/includes/footer.php';
?>