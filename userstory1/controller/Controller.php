<?php
    require 'model/Model.php';
    require 'model/sports.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

	class Controller
	{

 		function __construct()
		{
			$this->objconfig = new config();
			$this->objsm =  new Model($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler()
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act)
			{
                case 'add' :
					$this->insert();
					break;
				case 'update':
					$this->update();
					break;
				case 'delete' :
					$this -> delete();
					break;
				default:
                    $this->list();
			}
		}
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}
        // check validation
		public function checkValidation($sporttb)
        {    $noerror=true;
            // Validate category
            if(empty($sporttb->mankement)){
                $sporttb->mankement_msg = "Veld staat leeg.";$noerror=false;
            } elseif(!filter_var($sporttb->mankement, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $sporttb->mankement_msg = "Onmogelijke invulling.";$noerror=false;
            }else{$sporttb->mankement_msg ="";}
            // Validate name
            if(empty($sporttb->voertuig)){
                $sporttb->voertuig_msg = "Veld staat leeg.";$noerror=false;
            } elseif(!filter_var($sporttb->voertuig, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $sporttb->voertuig_msg = "Onmogelijke invulling.";$noerror=false;
            }else{$sporttb->voertuig_msg ="";}
            return $noerror;
        }
        // add new record
		public function insert()
		{
            try{
                $sporttb=new mankement();
                if (isset($_POST['addbtn']))
                {
                    // read form value
                    $sporttb->kenteken = trim($_POST['kenteken']);
                    $sporttb->voertuig = trim($_POST['voertuig']);
                    $sporttb->mankement = trim($_POST['mankement']);
                    $sporttb->date = date('Y-m-d');
                    //call validation
                    $chk=$this->checkValidation($sporttb);
                    if($chk)
                    {
                        //call insert record
                        $pid = $this -> objsm ->insertRecord($sporttb);
                        if($pid>0){
                            $this->list();
                        }else{
                            echo "Er is iets fout gegaan..., probeer het opnieuw.";
                            var_dump($sporttb);
                        }
                    }else
                    {
                        $_SESSION['sporttbl0']=serialize($sporttb);//add session obj
                        $this->pageRedirect("view/insert.php");
                    }
                }
            }catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }
        // update record
        public function update()
		{
            try
            {

                if (isset($_POST['updatebtn']))
                {
                    $sporttb=unserialize($_SESSION['sporttbl0']);
                    $sporttb->id = trim($_POST['id']);
                    $sporttb->category = trim($_POST['category']);
                    $sporttb->name = trim($_POST['name']);
                    $sporttb->date = date('Y-m-d');
                    // check validation
                    $chk=$this->checkValidation($sporttb);
                    if($chk)
                    {
                        $res = $this -> objsm ->updateRecord($sporttb);
                        if($res){
                            $this->list();

                        }else{
                            echo "Somthing is wrong..., try again.";
                        }
                    }else
                    {
                        $_SESSION['sporttbl0']=serialize($sporttb);
                        $this->pageRedirect("view/update.php");
                    }
                }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                    $id=$_GET['id'];
                    $result=$this->objsm->selectRecord($id);
                    $row=mysqli_fetch_array($result);
                    $sporttb=new sports();
                    $sporttb->id=$row["id"];
                    $sporttb->name=$row["name"];
                    $sporttb->category=$row["category"];
                    $_SESSION['sporttbl0']=serialize($sporttb);
                    $this->pageRedirect('view/update.php');
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }
        // delete record
        public function delete()
		{
            try
            {
                if (isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $res=$this->objsm->deleteRecord($id);
                    if($res){
                        $this->pageRedirect('index.php');
                    }else{
                        echo "Somthing is wrong..., try again.";
                    }
                }else{
                    echo "Invalid operation.";
                }
            }
            catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }
        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "view/list.php";
        }
    }


?>
