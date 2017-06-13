<?php

include_once('header.php');
include_once('class.igre.php');
?>

<?php
		
		if (isset($_REQUEST['submit_btn']) )
		{

			$novaigra = new games();
			$registracija = $novaigra->dodajIgru( array ( $_REQUEST['uzrast'],
											$_REQUEST['gamename'],
											$_REQUEST['description'],
											$_REQUEST['picture'],
											$_REQUEST['video']	));
											
			if ($registracija)
			{
				echo "Igra dodana</br>";
				echo '<a href="mojekategorije.php">Natrag na Moje kategorije</a>';
			}		
			else 
			{
				echo "Dodavanje igre nije uspjelo.</br>";
				echo '<a href="dodajnovuigru.php">Natrag na formular<a/>';
			}
		}

else	
{
	include_once('class.KategorijeUzrasta.php');
	
	$moderator = new kategorije();
	$moderator->moderatorKategorije($_REQUEST['id']);

	foreach ($moderator->moderator_kategorije as $key=>$sifra)
	{ 
	}
	?>

<section>
	<div class="container">
		<div class="darkTwo">
		
			<form method="POST" action="">
				<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
				<hr style="color:#f5e356;" />

					Odaberi uzrast </br>
					<select name="uzrast">
						<?php
							$uzrasti = new games();
							$uzrasti->uzrastNaziv($aktivni_korisnik_id);
							
							foreach($uzrasti->uzrast_id as $kljuc => $id)
							{
								echo '<option value="'.$id.'">'.$uzrasti->uzrast_naziv[$kljuc].'</option>';
							}
						
						?>
					</select></br>
			Naziv igre*: </br>
					<input type="text" name="gamename" value="" required/><br />
			
			Opis igre: </br>
					<textarea name="description" rows="4" cols="70" required/></textarea><br />	
				Slika*:</br>
					<input type="url" name="picture" value="" required/><br />
				Video:</br>
					<input type="url" name="video" value="" /><br /></br>
				<hr style="color:#f5e356;" />	
				
				<input type="submit" class="button" name="submit_btn" value="Dodaj igru" />
			</form>

		</div>
	</div>
</section>
<?php
}
include_once('footer.html');
?>








