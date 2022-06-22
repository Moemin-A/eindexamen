<?php
class Overzicht extends Controller {

  public function __construct() {
    $this->GebruikerModel = $this->model('Gebruiker');
  }


  public function index(){

    try{
      $teller = 1;
      $sumA=5;
      $sumB=2;
      $Sum= $sumA-$sumB;
      echo $Sum;
      $records = "";
      foreach($this->GebruikerModel->getLessen() as $record){
          $records .= '<tr>
          <td>'. $teller . '</td>
          <td>'. $record->Naam . '</td>
          <td>'. $record-> Datum . '</td>
                                     
          
          <td>
          <a href="'. URLROOT .'/Overzicht/indexPakket">
              <button type="button" class="btn btn-success">Pakket </button>
          </a>
      </td>

          ';
        $teller++;
      }
      
  }catch(PDOException $e){
      echo $e->getMessage();
  }
  $data = [
      "records" => $records,
     
  ];
  
  $this->view('Overzicht/index',$data);
  }

//haal Instructeurs info op
public function indexPakket(){

  try{
    $records = "";
    foreach($this->GebruikerModel->getPakket() as $record){
        $records .= '<tr>
        <td>'. $record-> AantalLessen . '</td>
        <td>'. $record->Prijs . '</td>
        <td>'. $record->BetaalTermijnen . '</td>
        

        


 ';
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
$data = [
    "records" => $records,
   
];

$this->view('Overzicht/indexPakket',$data);
}

public function indexLeerlingen(){

  /**
   * Haal de studenten info op
   */
  try{
    $records = "";
    foreach($this->GebruikerModel->getLeerlingen() as $record){
        $records .= '<tr>
        <td>'. $record-> Voornaam . '</td>
        <td>'. $record->Tussenvoegsel . '</td>
        <td>'. $record->Achternaam . '</td>
        <td>'. $record->Adres . '</td>   
        <td>'. $record->Woonplaats . '</td>           
        <td>'. $record->Rol . '</td>

        <td>
    </td>
     
    </tr>';
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
$data = [
    "records" => $records,
];

$this->view('Overzicht/indexLeerlingen',$data);
}
}


?>