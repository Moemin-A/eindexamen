<?php

	class Model
	{
		// set database config for mysql
		function __construct($consetup)
		{
			$this->host = $consetup->host;
			$this->user = $consetup->user;
			$this->pass =  $consetup->pass;
			$this->db = $consetup->db;
		}
		// open mysql data base
		public function open_db()
		{
			$this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
			if ($this->condb->connect_error)
			{
    			die("Erron in connection: " . $this->condb->connect_error);
			}
		}
		// close database
		public function close_db()
		{
			$this->condb->close();
		}

		// insert record
		public function insertRecord($obj)
		{
			try
			{
				$this->open_db();

				$query=$this->condb->prepare("INSERT INTO mankement (id,kenteken,voertuig,date,mankement) VALUES (?, ?, ?, ?)");
				$query->bind_param("sss",$obj->kenteken ,$obj->voertuig, $obj->date, $obj->mankement);
				$query->execute();
				$res= $query->get_result();
				$last_id=$this->condb->insert_id;
				$query->close();
				$this->close_db();
				return $last_id;
			}
			catch (Exception $e)
			{
				$this->close_db();
            	throw $e;
        	}
		}
        //update record
		public function updateRecord($obj)
		{
			try
			{
				$this->open_db();
				$query=$this->condb->prepare("UPDATE mankement SET category=?,name=? WHERE id=?");
				$query->bind_param("ssi", $obj->category,$obj->category,$obj->name,$obj->id);
				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
				return true;
			}
			catch (Exception $e)
			{
            	$this->close_db();
            	throw $e;
        	}
        }
         // delete record
		public function deleteRecord($id)
		{
			try{
				$this->open_db();
				$query=$this->condb->prepare("DELETE FROM mankement WHERE id=?");
				$query->bind_param("i",$id);
				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
				return true;
			}
			catch (Exception $e)
			{
            	$this->closeDb();
            	throw $e;
        	}
        }
        // select record mankement
		public function selectRecord($id)
		{
			try
			{
                $this->open_db();
                if($id>0)
				{
					$query=$this->condb->prepare("SELECT * FROM mankement WHERE id=?");
					$query->bind_param("i",$id);
				}
                else
                {$query=$this->condb->prepare("SELECT * FROM mankement");	}

				$query->execute();
				$res=$query->get_result();
				$query->close();
				$this->close_db();
                return $res;
			}
			catch(Exception $e)
			{
				$this->close_db();
				throw $e;
			}	

		}

		// select record car

		public function selectCar()
		{
			$this->open_db();
			if($this->open_db())
			{

			$query=$this->condb->prepare("SELECT * FROM voertuig");

			$query->execute();
			$res=$query->get_result();
			$query->close();
			$this->close_db();
							return $res;

		}
	}
}
?>
