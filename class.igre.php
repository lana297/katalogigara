<?php

include_once('db.php');

class games
{
	public $igra_id;
	public $uzrast_id;
	public $uzrast_naziv;
	public $naziv;
	public $opis;
	public $datum;
	public $vrijeme;
	public $slika;
	public $video;
	
	
	public function uzrastNaziv($moderator_id)
	{
		$db = new baza();
		
		$res = $db->query("SELECT  u.uzrast_id, u.naziv
							FROM uzrast AS u
							WHERE u.moderator_id =".$moderator_id."");
							
		while ($row = $res->fetch_array())
		{
			$this->uzrast_id[]= $row['uzrast_id'];
			$this->uzrast_naziv[]= $row['naziv'];
		}			
	}


	public function igrePoKategorijama($sifraKategorije)
	{
		$db = new baza();

		$res = $db->query("SELECT igra_id, 
								uzrast_id, 
								naziv,
								opis,
								slika, 
								video
							FROM igra
							WHERE uzrast_id = ".$sifraKategorije."
							ORDER BY datum desc
							 ");
		
		if($res->num_rows == 0)
		{
			return $res;
		}
		else
		{
			while ( $row = $res->fetch_array() )
			{
				$this->igra_id[] = $row['igra_id'];
				$this->uzrast_id[] = $row['uzrast_id'];
				$this->naziv[] = $row['naziv'];
				$this->opis[] = $row['opis'];
				$this->slika[] = $row['slika'];
				$this->video[] = $row['video'];

			}
			return $res;
		}
	}
	
	public function ispisigre($sifraIgre)
	{
		$db = new baza();
		
		$res = $db->query("SELECT igra_id, 
								uzrast_id, 
								naziv, 
								opis,  
								datum, 
								vrijeme, 
								slika, 
								video
							FROM igra
							WHERE igra_id = ".$sifraIgre."
							GROUP BY datum desc");
							
		while ( $row = $res->fetch_array() )
		{
			$this->igra_id[] = $row['igra_id'];
			$this->uzrast_id[] = $row['uzrast_id'];
			$this->naziv[] = $row['naziv'];
			$this->opis[] = $row['opis'];
			$this->datum[] = $row['datum'];
			$this->vrijeme[] = $row['vrijeme'];
			$this->slika[] = $row['slika'];
			$this->video[] = $row['video'];
		}			
	}
	
	public function dodajIgru($gamedata)
	{
		$db = new baza();
		
		$result = $db->query("INSERT INTO igra ( uzrast_id, naziv, opis, datum, vrijeme, slika, video)
							VALUES( '".$gamedata[0]."',
									'".$gamedata[1]."',
									'".$gamedata[2]."',
									now(),
									now(),
									'".$gamedata[3]."',
									'".$gamedata[4]."')
									");
									
		if ($db->errno == 1062)
		{
			return false;
		}			
		else 
		{
			return $db->insert_id;
		}
	}
	
	public function urediIgru($newdata)
	{
		$db = new baza();
		
		$result = $db->query("UPDATE igra SET
								uzrast_id = '".$db->escape_string($newdata[1])."',
								naziv = '".$db->escape_string($newdata[2])."',
								opis = '".$db->escape_string($newdata[3])."',
								slika = '".$db->escape_string($newdata[4])."',
								video = '".$db->escape_string($newdata[5])."'
							WHERE igra_id = '".$newdata[0]."'");

	

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













