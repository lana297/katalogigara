<?php 
	include_once('class.korisnik.php');
	
		session_start();
	
		//var_dump($_SESSION['authmail']);
		//var_dump($_SESSION['authpass']);
	
	if (isset($_SESSION['authmail']) && isset($_SESSION['authpass']))
	{

		
		$korisnik = new korisnik();
		if ($korisnik->aktivirajKorisnika($_SESSION['authmail'], $_SESSION['authpass']))
		{
			if($korisnik->login($_SESSION['authmail'], $_SESSION['authpass']))
					{
							session_start();
							
							
							$_SESSION['aktivni_korisnik']= $korisnik->korisnicko_ime;
							$_SESSION['aktivni_korisnik_ime']= $korisnik->ime . " " .$korisnik->prezime;
							$_SESSION['aktivni_korisnik_id']= $korisnik->korisnik_id;
							$_SESSION['aktivni_korisnik_tip']= $korisnik->tip_id;
							
							setcookie("email", "");
							setcookie("password", "");
							
							
							
							if ($_SESSION['aktivni_korisnik_tip'] == 0)
								header("Location:korisnici.php");
							elseif ($_SESSION['aktivni_korisnik_tip'] == 1)
								header("Location:mojekategorije.php");
							else 
								header("Location:mojeigre.php");	
					}
		} 
		else 
		{
			header("Location:index.php");
		}
	}
?>