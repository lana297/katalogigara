<?php
include_once('header.php');
include_once('class.igre.php');

if(isset($_REQUEST['submit_btn']))
{
	$igra = new games();
	
	
	$update = $igra->urediIgru( array ($_REQUEST['id'],
										$_REQUEST['uzrast_id'],
										$_REQUEST['gamename'],
										$_REQUEST['description'],
										$_REQUEST['picture'],
										$_REQUEST['video']   ));		
										
	if($update == 1)
		{
			echo "Igra je uspješno ažurirana!</br>";
			echo '<a href="mojekategorije.php">Natrag na moje kategorije</a>';
		}		
	else 
		{
			echo "Dodavanje igre nije uspjelo. Tekst greške: ". $update ."</br>";
			echo '<a href="dodajIgru.php">Natrag na formular<a/>';
		}
}

else 
{
	
	$igra = new games();
	$igra->ispisigre($_REQUEST['sifrai']);
	foreach ($igra->igra_id as $key => $newData)
	{}
?>

<section>
	<div class="container">
		<div class="darkTwo">
		
			<form method="POST" action="">
				<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
				<hr style="color:#f5e356;" />

					<input type="hidden" name="id" size="30" value="<?php echo $newData; ?>"/>
					<input type="hidden" name="uzrast_id" size="30"  value="<?php echo $igra->uzrast_id[$key]; ?>"/>
			Naziv igre: </br>
					<input type="text" name="gamename" size="30"  value="<?php echo $igra->naziv[$key]; ?>"><br />
				Opis igre: </br>
					<textarea name="description" rows="4" cols="70"><?php echo $igra->opis[$key]; ?></textarea><br />	
				Slika:</br>
					<input type="url" name="picture" size="30" value="<?php echo $igra->slika[$key]; ?>" /> <br />
				Video:</br>
					<input type="url" name="video" size="30" value="<?php echo $igra->video[$key]; ?>" /><br /></br>
				<hr style="color:#f5e356;" />	
				
				<input type="submit" class="buttonTwo" name="submit_btn" value="Spremi ažurirane podatke" />
			</form>

		</div>
	</div>

</section>
	<?php 	
}
include_once('footer.html');
	?>