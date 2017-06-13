<?php
include('header.php');
include_once('class.korisnik.php');
include_once('class.htmltable.php');


	if($aktivni_korisnik_tip == 0)
		{
?>
		<div class="container">	
			<section>
				<div class="dark">
					<a class="buttonTwo" href="dodajkorisnika.php">Dodaj korisnika</a>
				</div>	
			</section>
			
			<div class="container">
				<?php 	
				}

			$korisnik = new korisnik();
			$korisnik->sviKorisnici();
			foreach( $korisnik->korisnik_id as $key=>$sifra)
			{
			$uredi = '<a href="urediKorisnika.php?sifrakor='.$sifra.'" class="button"style="font-size:20px; text-decoration: none;">Uredi</a>';
			$slika = "<img src=".$korisnik->slika[$key]." style='max-height:70px; max-width:40px;' />";
			$tablica[]= array( $sifra, $korisnik->korisnicko_ime[$key],  $korisnik->prezime[$key], $korisnik->email[$key],  $korisnik->tip_id[$key], $slika, $uredi);
			}
			
		

$tbl = new htmlTable();
$tbl->ispisi($tablica);

?>
</div>
</div>
<?php

include_once('footer.html');
?>

