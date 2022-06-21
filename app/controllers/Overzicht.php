<?php
class Overzicht extends Controller {

  public function __construct() {
    $this->GebruikerModel = $this->model('Gebruiker');
  }


  public function index(){

    try{
      $records = "";
      foreach($this->GebruikerModel->getAll() as $record){
          $records .= '<tr>
          <td>'. $record-> Voornaam . '</td>
          <td>'. $record->Tussenvoegsel . '</td>
          <td>'. $record->Achternaam . '</td>
          <td>'. $record->Adres . '</td>   
          <td>'. $record->Woonplaats . '</td>           
          <td>'. $record->Rol . '</td>
                                        ';
      }
  }catch(PDOException $e){
      echo $e->getMessage();
  }
  $data = [
      "records" => $records,
     
  ];
  
  $this->view('Overzicht/index',$data);
  }


public function indexInstructeurs(){

  try{
    $records = "";
    foreach($this->GebruikerModel->getInstructeurs() as $record){
        $records .= '<tr>
        <td>'. $record-> Voornaam . '</td>
        <td>'. $record->Tussenvoegsel . '</td>
        <td>'. $record->Achternaam . '</td>
        <td>'. $record->Adres . '</td>   
        <td>'. $record->Woonplaats . '</td>           
        <td>'. $record->Rol . '</td>




 ';
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
$data = [
    "records" => $records,
   
];

$this->view('Overzicht/indexInstructeurs',$data);
}

public function indexLeerlingen(){


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