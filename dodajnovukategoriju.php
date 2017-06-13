<?php

include_once('header.php');
include_once('class.KategorijeUzrasta.php');

	if(isset($_REQUEST['submit_btn']) )
	{
	
		$kategorija = new kategorije();
		$registracija = $kategorija->dodajKategoriju( array( $_REQUEST['moderator'],
														 $_REQUEST['gameName'],
														 $_REQUEST['description'] ) );
														 
		if($registracija)
		{
			echo "<p>Kategorija uspješno dodana!</p></br>";
			echo '<a href="kategorijeUzrasta.php">Povratak na kategorije</a>';
		}
		else
		{
			echo "Dodavanje kategorije nije uspjelo...</br>";
			echo '<a href="dodajnovukaregoriju.php">Povratak na formular</a>';
		}
	}
else
{
?>
<section>
	<div class="container">
		<div class="darkTwo">
		
			<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
			<hr style="color:#f5e356;" />
			
				<form method="POST" action="">
					Moderator kategoroije: </br>
					<select name="moderator">
					<?php
						$moderator = new kategorije();
						$moderator->naziviModeratora();
						
						foreach($moderator->id_moderator as $kljuc => $id)
						{
							echo '<option value="'.$id.'">'.$moderator->moderator_kategorije[$kljuc].'</option>';
						}
					?>
					</select></br>
					
					Naziv igre: </br>
					<input type="text" name="gameName" size="30" value="" /> </br>
					
					Opis igre: </br>
					<input type="text" name="description" size="30" value="" /> </br>

					<hr style="color:#f5e356;" />
					<input type="submit" name="submit_btn"  class="buttonTwo" value="Dodaj kategoriju" />
					</hr>
				</form>
		</div>
	</div>
</section>

<?php
	}
	include('footer.html');
?>