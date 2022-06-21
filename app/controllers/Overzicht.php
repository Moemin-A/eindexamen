<?php
class ToDo extends Controller {

  public function __construct() {
    $this->GebruikerModel = $this->model('Gebruiker');
  }

  

  public function index ($message = ""){

    $alert = '';
    switch($message){
        case "delete-success":
            $alert = '<div class="alert alert-success" role="alert">
                        Gebruiker is succesvol verwijderd
                    </div>';
            break;
        case "delete-failed":
            $alert = '<div class="alert alert-danger" role="alert">
                        Gebruiker is helaas niet verwijderd probeer opnieuw
                    </div>';
            break;
        case "update-failed":
            $alert = '<div class="alert alert-danger" role="alert">
                        Gebruiker kon niet geupdate worden probeer opnieuw
                    </div>';
            break;
        case "update-success":
            $alert = '<div class="alert alert-success" role="alert">
                        Gebruiker is succesvol geupdate
                    </div>';
            break;

            case "create-failed":
              $alert = '<div class="alert alert-danger" role="alert">
                          Gebruiker kon niet aangemaakt worden probeer opnieuw
                      </div>';
              break;
          case "create-success":
              $alert = '<div class="alert alert-success" role="alert">
                          Gebruiker is succesvol aangemaakt
                      </div>';
              break;
    }

    try{
        $records = "";
        foreach($this->GebruikerModel->getAllGebruikers() as $record){
            $records .= '<tr>
            <td>'. $record->omschrijving . '</td>
            <td>'. $record->AantalInBeschikking . '</td>
            <td>'. $record->AantalInLeen . '</td>
            <td>'. $record->CatogorieId . '</td>          


     
            <td>
                <a href="'. URLROOT .'/todo/update/'. $record->id . '">
                    <button type="button" class="btn btn-success">update</button>
                </a>
            </td>
       <td>
                <a href="'. URLROOT .'/todo/delete/'. $record->id . '">
                    <button type="button" class="btn btn-danger">delete</button>
                </a>
            </td>
         
        </tr>';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $data = [
        "records" => $records,
        "alert" => $alert
    ];

    $this->view('ToDo/index',$data);
}


  public function update($id = null){
    // var_dump($_SERVER);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
      try{
     $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
     $this->GebruikerModel->updateGebruiker($_POST);
     header("Location: " . URLROOT . "/todo/index/update-success");

    } catch(PDOException $e){
      header("Location: " . URLROOT . "/Todo/index/update-failed");
    }
  }else{
    
      $row = $this->GebruikerModel->getSingle($id);
      $Catogoriecode = $this->GebruikerModel->getCatogorieId();
      $tablesRow = "";

      foreach($Catogoriecode as $value){
        $tablesRow .= "
        <option value='$value->Catogoriecode'>$value->Catogoriecode</option>
        ";
      }
  

    }

      $data = [
        'CatogorieIdData' => $tablesRow,
       'row' => $row, $Catogoriecode
      

     ];

     
     $this->view("ToDo/update", $data);
   
    }
    // var_dump($id); exit();}



public function delete($id){
  try{
    $this->GebruikerModel->deleteGebruiker($id);

      if($this->GebruikerModel->deleteGebruiker($id)){
          

          header("Location: " . URLROOT . "/Todo/index/delete-success");
      }
      else{
          header("Location: " . URLROOT . "/Todo/index/delete-failed");
      }
  }catch(PDOException $e){
      header("Location: " . URLROOT . "/Todo/index/delete-failed");
  }
}


public function create(){
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  //  var_dump($_POST);
  try{
      $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->GebruikerModel->createGebruiker($_POST);
        header("Location: " . URLROOT . "/Todo/index/create-success");

      } catch(PDOException $e){
        header("Location: " . URLROOT . "/Todo/index/create-failed");
      }
  }else{
    $Catogoriecode = $this->GebruikerModel->getCatogorieId();
    $tablesRow = "";
    foreach($Catogoriecode as $value){
      $tablesRow .= "
      <option value='$value->Catogoriecode'>$value->Catogoriecode</option>
      ";
    }
  $data = [
    'title' => '<h4>Toevoegen van nieuwe artikelen </h4>',
      'CatogorieIdData' => $tablesRow];
 

  
  $this->view("ToDo/create", $data);

}
}
public function indexAdmin(){


  try{
      $records = "";
      foreach($this->GebruikerModel->getAllGebruikersAdmin() as $record){
          $records .= '<tr>
          <td>'. $record->omschrijving . '</td>
          <td>'. $record->AantalInBeschikking . '</td>
          <td>'. $record->AantalInLeen . '</td>
          <td>'. $record->Catogorienaam . '</td>
          <td>'. $record->CatogorieId . '</td>
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

  $this->view('ToDo/indexAdmin',$data);
}
}
?>