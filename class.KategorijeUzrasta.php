<?php

include_once('db.php');

class kategorije
{
	public $id_kategorije;
	public $id_moderator;
	public $moderator_kategorije;
	public $naziv_kategorije;
	public $opis_kategorije;
	
	public function naziviModeratora()
	{
		$db = new baza();
		
		$res = $db->query("SELECT  k.korisnik_id, k.korisnicko_ime
							FROM korisnik as k
							WHERE k.tip_id = 1");
							
		while ($row = $res->fetch_array())
		{
			$this->id_moderator[]= $row['korisnik_id'];
			$this->moderator_kategorije[]= $row['korisnicko_ime'];
		}			
	}
	
	public function sveKategorije()
	{
		$db = new baza();
		
		$res = $db->query('SELECT	uzrast_id, 
									moderator_id,
									naziv, 
									opis
						FROM uzrast');
		
		while ($row = $res->fetch_array() )
		{
			$this->id_kategorije[] = $row['uzrast_id'];
			$this->moderator_kategorije[] = $row['moderator_id'];
			$this->naziv_kategorije[] = $row['naziv'];
			$this->opis_kategorije[] = $row['opis'];
		}
	}
	
		
	public function kategorija($uzrast_id)
	{
		$db = new baza();
		
		$res = $db->query("SELECT	uzrast_id, 
									moderator_id,
									naziv, 
									opis
						FROM uzrast 
						WHERE uzrast_id = ".$uzrast_id."");
		
		while ($row = $res->fetch_array() )
		{
			$this->id_kategorije[] = $row['uzrast_id'];
			$this->moderator_kategorije[] = $row['moderator_id'];
			$this->naziv_kategorije[] = $row['naziv'];
			$this->opis_kategorije[] = $row['opis'];
		}
	}

	public function moderatorKategorije($id_moderator)
	{
		$db = new baza();
		
		$res = $db->query("	SELECT 
							uzrast_id,
							moderator_id,
							naziv,
							opis
							FROM uzrast 
							WHERE moderator_id= ".$id_moderator."");
		
		while ($row = $res->fetch_array())
		{
			$this->id_kategorije[] = $row['uzrast_id'];
			$this->moderator_kategorije[] = $row['moderator_id'];
			$this->naziv_kategorije[] = $row['naziv'];
			$this->opis_kategorije[] = $row['opis'];

		}
	}
	
	public function dodajKategoriju($uzrastdata)
	{
		$db = new baza();
		
		$res = $db->query(	"INSERT INTO uzrast 
								 ( moderator_id, naziv, opis)
							VALUES ( '".$uzrastdata[0]."',
									'".$uzrastdata[1]."',
									'".$uzrastdata[2]."')"  );
		
		if ($db->errno == 1062)
		{
			return false;
		}			
		else
		{
			return $db->insert_id;
		}
	}
	
	public function urediKategoriju($newdata)
	{
		$db = new baza();
		
		$result = $db->query( "UPDATE uzrast SET
								moderator_id= '".$db->escape_string($newdata[1])."',
								naziv = '".$db->escape_string($newdata[2])."',
								opis = '".$db->escape_string($newdata[3])."'
							WHERE uzrast_id = '".$newdata[0]."'");


		if($result)
		{
			return $result;
		}
		else
		{
			return $db->error;
		}
	}

}



?>