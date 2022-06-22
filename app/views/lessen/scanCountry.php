<h3> <?= $data["title"]; ?></h3>

<form action="<?= URLROOT; ?>/docenten/scanDocent" method="post">
  <input type="text" name="docent" id="handScanHelp" onmouseover="this.focus();" aria-describedby="handScanHelp" autofocus>
  <small id="handScanHelp">Richt de scanner op de barcode en klik.</small>
  <!-- <input type="submit" value="submit"> -->
</form>

<table>
  <thead>
  <th>id</th>
  <th>Land</th>
  <th>Hoofdstad</th>
  <th>Continent</th>
  <th>Aantal inwoners</th>
  </thead>
  <tbody>
    <?= $data["rowData"]; ?>
  </tbody>
</table>