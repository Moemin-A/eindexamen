<?php
class Autos extends Controller {

  public function __construct() {
    $this->GebruikerModel = $this->model('Auto');
  }

  

  public function index ($message = ""){

    $alert = '';
    switch($message){
            case "create-failed":
              $alert = '<div class="alert alert-danger" role="alert">
                                 Mankement is leeg..
                      </div>';
              break;
          case "create-success":
              $alert = '<div class="alert alert-success" role="alert">
                        Mankement is toegevoegd.
                      </div>';
              break;

    }

    try{
        $records = "";
        foreach($this->GebruikerModel->getAllCars() as $record){
            $records .= '<tr>
            <td>'. $record->Kenteken . '</td>
            <td>'. $record->Type . '</td>
        
         
        </tr>';
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $data = [
        "records" => $records,
        "alert" => $alert
    ];

    $this->view('Autos/index',$data);
}

    // var_dump($id); exit();}




public function create(){
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  //  var_dump($_POST);
  try{
      $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->GebruikerModel->createMankement($_POST);
        header("Location: " . URLROOT . "/Autos/index/create-success");

      } catch(PDOException $e){
        header("Location: " . URLROOT . "/Autos/index/create-failed");
      }
  }else{
    $Mankement = $this->GebruikerModel->getMankement();
    $tablesRow = "";
    foreach($Mankement as $value){
      $tablesRow .= "
      <option value='$value->Kenteken'>$value->Kenteken</option>
      ";
    }
  $data = [
    'title' => '<h4></h4>',
      'MankementData' => $tablesRow];
  $this->view("Autos/create", $data);

}
}

}
?>