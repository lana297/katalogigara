<?php
include_once('db.php');

class pretplate 
{
	public $id;
	public $naziv;
	public $opis;
	public $slika;
	public $video;
	public $ime;
	public $prezime;
	public $brojpretplata;
	public $uzrast_id;
	public $korisnik_id;
	public $pretplacen;



	public function aktivnepretplate($korisnikid)	
	{
		$db = new baza();
		
		$res = $db->query( 	"SELECT i.igra_id,
									i.naziv, 
									i.opis,
									i.slika,
									i.video
							FROM igra i, uzrast u, pretplata p 
							WHERE u.uzrast_id = p.uzrast_id 
							AND i.uzrast_id = u.uzrast_id
							AND p.korisnik_id = ".$korisnikid." 
							AND p.pretplacen = 1
							ORDER BY datum, vrijeme");
		
		if ($res->num_rows)
		{
			while ($row = $res->fetch_array())
			{
				$this->id[] = $row['igra_id'];
				$this->naziv[] = $row['naziv'];
				$this->opis[] = $row['opis'];
				$this->slika[] = $row['slika'];
				$this->video[] = $row['video'];
			}
			return $res;
		}
		else
		{
			return $res;
		}	
	}
	
	public function pretplatniciUzrasta($uzrast_id)
	{
		$db = new baza();
		
		$res = $db->query("SELECT k.korisnik_id,
								k.ime, 
								k.prezime 
						FROM korisnik k,  pretplata p
						WHERE k.korisnik_id = p.korisnik_id 
						AND p.uzrast_id = ".$uzrast_id."
						AND  p.pretplacen = 1");

		if($res->num_rows == 0)
		{
			return $res;
		}
		else
		{
			while ($row = $res->fetch_array())
			{
				$this->id[]= $row['korisnik_id'];
				$this->ime[]= $row['ime'];
				$this->prezime[]= $row['prezime'];
			}
			return $res;
		}
	}
	
	public function ukupniPretplatnici($id_uzrast)
	{
		$db = new baza();
		
		$res = $db->query("SELECT count(*) FROM uzrast u, pretplata p 
							WHERE u.uzrast_id = p.uzrast_id 
							and u.uzrast_id = ".$id_uzrast."
							AND  p.pretplacen = 1
							GROUP BY u.uzrast_id");
							
		while ($row = $res->fetch_array() )
		{
			$this->brojpretplata = $row['count(*)'];
		}			
					return $this->brojpretplata;	
			
	}
	
	
	public function OdjavljeniNikadPretplaceniKor($newdata)
	{
		$db = new baza();
		
		$res = $db->query("SELECT DISTINCT (k.korisnik_id) as TEST FROM korisnik k,  pretplata p
							WHERE (k.korisnik_id = p.korisnik_id AND p.uzrast_id = ".$newdata."
							AND  p.pretplacen = 0) OR k.korisnik_id not in(
							SELECT korisnik_id FROM pretplata WHERE uzrast_id = ".$newdata."
							AND pretplacen =  1)");
							

					
		while($row = $res->fetch_array())
		{
			$this->korisnik_id[] = $row['TEST'];

		}

	}
	
	
	public function dodajPretplatu($pretplata)
	{
		$db = new baza();
		
		$check = $db->query("SELECT pretplacen FROM pretplata WHERE korisnik_id = " . $pretplata[0] . "
							AND uzrast_id = " . $pretplata[1]);
		
		$postoji = $check->num_rows;
		
		if ($postoji)
		{
			$res = $db->query("UPDATE pretplata SET
							pretplacen = 1 
							WHERE korisnik_id='".$pretplata[0]."'
							AND uzrast_id='".$pretplata[1]."'");
		}
		else
		{
			$res = $db->query("INSERT INTO pretplata (korisnik_id, uzrast_id, pretplacen) 
							VALUES ( '".$pretplata[0]."',
									'".$pretplata[1]."',
									1)");
		}
		if($res)
		{
			return $res;
		}			
		else
		{
			return $db->error;
		}
	}
	
	public function odjaviPretplatu($pretplata)
	{
		$db = new baza();
		
		$res = $db->query("UPDATE pretplata SET
							pretplacen = 0 
							WHERE korisnik_id='".$pretplata[0]."'
							AND uzrast_id='".$pretplata[1]."'");
							
		if($res)
		{
			return $res;
		}			
		else
		{
			return $db->error;
		}
	}	
}



