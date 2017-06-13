<?php

include_once('header.php');
include_once('class.KategorijeUzrasta.php');

if(isset($_REQUEST['submit_btn']))
{
	$kateg = new kategorije();
	
	$update = $kateg->urediKategoriju( array (	$_REQUEST['id'],
												$_REQUEST['moderator'],
												$_REQUEST['gamename'],
												$_REQUEST['description'] ));
											
	if($update == 1)
	{
		echo "Kategorija je uspješno ažurirana!</br>";
		echo '<a href="kategorijeUzrasta.php">Natrag na kategorije</a>';
	}		
	else 
	{
		echo "Ažuriranje kategorije nije uspjelo. Tekst greške: ". $update ."</br>";
		echo '<a href="kategorijeUzrasta.php">Natrag kategorije<a/>';
	}
}

else 
{

$kategorija = new kategorije();
$kategorija->kategorija($_REQUEST['sifrak']);
foreach ($kategorija->id_kategorije as $key => $sifra)
{}
?>
<section>
	<div class="container">
		<div class="darkTwo">
		
		<form method="POST" action="">
			<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
			<hr style="color:#f5e356;" />
				
				<input type="hidden" name="id" value="<?php echo $sifra; ?>" /> 
					
				Moderator kategoroije: </br>
					<select name="moderator">

						<?php
						$moderator = new kategorije();
						$moderator->naziviModeratora();
						
						foreach($moderator->id_moderator as $kljuc => $mod)
						{	
						?>
						<option value="<?php echo $mod;?>" <?php echo ($mod ==  $kategorija->moderator_kategorije[$key]) ? ' selected="selected"' : '';?>><?php echo $moderator->moderator_kategorije[$kljuc];?></option>
						<?php								
						}
						?>
					</select></br>
			
				
				Naziv kategorije: </br>
					<input type="text" name="gamename" size="30" value="<?php echo $kategorija->naziv_kategorije[$key];?>" /> </br>
					
					Opis igre: </br>
					<textarea name="description" rows="4" cols="70"><?php echo $kategorija->opis_kategorije[$key];?></textarea><br />	
				
					<hr style="color:#f5e356;" />
					<input type="submit" name="submit_btn" class="buttonTwo" value="Spremi ažurirane podatke" />
					</hr>
				</form>
		</div>
	</div>
</section>
<?php
}
include_once('footer.html');
?>