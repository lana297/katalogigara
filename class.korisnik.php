<?php

include_once('db.php');

class korisnik
{
	public $korisnik_id;
	public $korisnicko_ime;
	public $lozinka;
	public $ime;
	public $prezime;
	public $email;
	public $slika;
	public $top;
	public $tip_id;
	public $tip_korisnika;
	
	public function tipKorisnikaNaziv()
	{
		$db = new baza();
		
		$res = $db->query("SELECT DISTINCT t.tip_id, t.naziv 
						FROM tip_korisnika AS t, korisnik AS k
						WHERE t.tip_id = k.tip_id
						
							");
		
		while ($row = $res->fetch_array())
		{
			$this->tip_id[] = $row['tip_id'];
			$this->tip_korisnika[] = $row['naziv'];
		}
	}

	
	public function sviKorisnici()
	{
		$db = new baza();
		
		$res = $db->query("SELECT korisnik_id,
									korisnicko_ime,
									ime,
									prezime,
									email,
									slika,
									tip_id
							FROM korisnik");
			
			
		while ($podaci = $res->fetch_array())
		{
			$this->korisnik_id[] = $podaci['korisnik_id'];
			$this->korisnicko_ime[] = $podaci['korisnicko_ime'];
			$this->ime[] = $podaci['ime'];
			$this->prezime[] = $podaci['prezime'];
			$this->email[] = $podaci['email'];
			$this->slika[] = $podaci['slika'];
			$this->tip_id[] = $podaci['tip_id'];
	
		}							
	}
	
	public function korisnik_id($korisnik_id)
	{
		$db = new baza();
		
		$res = $db->query("SELECT korisnik_id,
									korisnicko_ime,
									lozinka,
									ime,
									prezime,
									email,
									slika,
									tip_id
							FROM korisnik
							WHERE korisnik_id = ".$korisnik_id."");
			
			
		while ($podaci = $res->fetch_array())
		{
			$this->korisnik_id[] = $podaci['korisnik_id'];
			$this->korisnicko_ime[] = $podaci['korisnicko_ime'];
			$this->lozinka[] = $podaci['lozinka'];
			$this->ime[] = $podaci['ime'];
			$this->prezime[] = $podaci['prezime'];
			$this->email[] = $podaci['email'];
			$this->slika[] = $podaci['slika'];
			$this->tip_id[] = $podaci['tip_id'];
	
		}							
	}
	
	public function login($username, $password)
	{
		$db = new baza();
		
		$res = $db->query("SELECT korisnik_id,
											korisnicko_ime,
											lozinka,
											ime,
											prezime,
											email,
											slika,
											tip_id
									FROM korisnik
							WHERE korisnicko_ime = '".$username."'
							AND lozinka = '".$password."'");
							
				
		if ( $res->num_rows > 0 )
		{
			$podaci = $res->fetch_array();
			
			$this->korisnik_id = $podaci['korisnik_id']; 
			$this->korisnicko_ime = $podaci['korisnicko_ime'];
			$this->lozinka = $podaci['lozinka'];
			$this->ime = $podaci['ime'];
			$this->prezime = $podaci['prezime'];
			$this->email = $podaci['email'];
			$this->slika = $podaci['slika'];
			$this->tip_id = $podaci['tip_id'];
			
			return true;
		}
			else
				return false;
	}
	
	public function dodajKorisnika($korisnickiPodaci)
	{
		$db = new baza();
		
		$result = $db->query("INSERT INTO korisnik 
							(  tip_id,
								korisnicko_ime,
								ime,
								prezime,
								email,
								slika  )
							VALUES( '".$korisnickiPodaci[0]."',
									'".$korisnickiPodaci[1]."',
									'".$korisnickiPodaci[2]."',
									'".$korisnickiPodaci[3]."',
									'".$korisnickiPodaci[4]."',
									'".$korisnickiPodaci[5]."') " );
		if ($db->errno == 1062)
		{
			return false;
		}
		else
		{
			return $db->insert_id;
		}	
	}
	
	public function pretplaceniKorisnici($uzrast_id)
	{
		$db = new baza();
		
		$res = $db->query("	SELECT p.korisnik_id,
									k.ime, 
									k.prezime 
							FROM korisnik k,  pretplata p
							WHERE k.korisnik_id = p.korisnik_id 
							AND p.uzrast_id = ".$uzrast_id."
							AND  p.pretplacen = 1");
							
		while ($row = $res->fetch_array())
		{
			$this->korisnik_id = $row['korisnik_id'];
			$this->ime = $row['ime'];
			$this->prezime = $row['prezime'];
		}					
	}
	

	public function topEkspert()
	{
		$db = new baza();
		
		$res = $db->query("
							SELECT count(*), k.ime, k.prezime FROM uzrast u, igra i, korisnik k
							WHERE u.uzrast_id = i.uzrast_id AND k.korisnik_id = u.moderator_id
							GROUP BY k.korisnik_id");
							
		while ($row = $res->fetch_array())
		{
			$this->top = $row['count(*)'];
			$this->korisnicko_ime = $row['ime'];
			$this->prezime= $row['prezime'];
		}					
	}
	
	public function urediKorisnika($newdata)
	{
		$db = new baza();
		
		$variabla = "UPDATE korisnik SET
		
								tip_id = '".$db->escape_string($newdata[1])."',
								korisnicko_ime = '".$db->escape_string($newdata[2])."',
								lozinka = '".$db->escape_string($newdata[3])."',
								ime = '".$db->escape_string($newdata[4])."',
								prezime = '".$db->escape_string($newdata[5])."',
								email = '".$db->escape_string($newdata[6])."',
								slika = '".$newdata[7]."'
							WHERE korisnik_id = '".$newdata[0]."'";
		
		$result = $db->query($variabla);

	$variabla

		if($result)
		{
			return $result;
		}
		else
		{

			return $db->error;
		}
	}
	public function deletepic($data)
	{
		$db = new baza();
		
	
	$result = $db->query("UPDATE korisnik
						SET slika = null 
						where korisnik_id = '$data'");
						
						
		
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