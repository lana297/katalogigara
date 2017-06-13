<?php

include_once('header.php');
include_once('class.igre.php');
include_once('class.pretplate.php');

if($aktivni_korisnik_tip == 0)
{

$ukupnep = new pretplate();
$ukupnep->ukupniPretplatnici($_REQUEST['sifrak']);
$varijabla = $ukupnep->ukupniPretplatnici($_REQUEST['sifrak']);

	if ($varijabla > 0)
	{	
	?>
	<section>
		<div class="dark">
				<p><?php echo "Ukupan broj pretplata za ovu kategoriju je = ".$varijabla."";?></p>
	<?php
	}			
	else
	{
		echo "Nema pretplata za ovu kategoriju";
	}	
}	



	if($aktivni_korisnik_tip == 2)
	{
	$neprijavlj = new pretplate();
	$neprijavlj->OdjavljeniNikadPretplaceniKor($_REQUEST['sifrak']);

	foreach ($neprijavlj->korisnik_id as $key => $korisnikid)		
			{
				if ($korisnikid === $aktivni_korisnik_id)
				{
					$odj = False;
					?>	
						<form method="POST" action="">
							<input type="hidden" name="korisnik_id" value="" />
							<input type="hidden" name="uzrast_id" value="" />
							
							<input type="hidden" name="odjava" value="false" />
					
							<input type="submit" name="submit_btn" class="buttonTwo" value="Prijavi se za ovu kategoriju!" />
						</form> 
					<?php
					
					break;
				}
			
				else
				{
					$odj = True;
				}
			}
		
		if ($odj == True)
		{
			?> 	<form method="POST" action="">
						<input type="hidden" name="korisnik_id" value="" />
						<input type="hidden" name="uzrast_id" value="" />
		
						<input type="hidden" name="odjava" value="true" />
		
						<input type="submit" name="submit_btn" class="buttonTwo" value="Odjavi se za ovu kategoriju!" />
					</form>
				<?php	
		}
	

				if(isset($_REQUEST['submit_btn']  ))
				{
					
					$pretpatiSe = new pretplate();
					
					if ($_POST['odjava'] == "true")
					{
	
						$odjava = $pretpatiSe->odjaviPretplatu( array ($aktivni_korisnik_id,
																		$_REQUEST['sifrak']  ));
					
						if ($odjava)
						{
							echo "Odjavljeni ste za ovu kategoriju!</br>";
							echo '<a href="kategorijeUzrasta.php">Natrag na kategorije</a>';
						}
						else 
						{
							echo "Odjava nije uspjela..<br /> " . $odjava;
							echo '<a href="kategorijeUzrasta.php">Natrag na kategorije</a>';
						}
					}
					else
					{

						$new = $pretpatiSe->dodajPretplatu( array ($aktivni_korisnik_id,
											$_REQUEST['sifrak']));
					
						if ($new == 1)
						{
							echo "Pretplaćeni ste za ovu kategoriju!</br>";
							
						}
						else 
						{
							echo "Pretplata nije uspjela.<br /> " . $new;
							echo '<a href="kategorijeUzrasta.php">Natrag na kategorije</a>';
						}
					}
				}
	
	}		
				

	?>
		</div>	
	</section>

	
<section id="boxesCont">
	<div class="container">
		<?php
		$igre = new games();	
		$popis = $igre->igrePoKategorijama($_REQUEST['sifrak']);	

			if ($popis->num_rows != 0)
			{	
				foreach ($igre->naziv as $key => $imeigre)
				{
		?>		
				<div class="box">
				<?php
				echo '<h2><a href="igra.php?sifrai='.$igre->igra_id[$key].'">'.$imeigre.'</a></h2>';
				echo "<p>Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. Lorem Ipsum postoji kao industrijski standard još od 16-og stoljeća.</p> ";

				?>	
				</div>	
				<?php
				}
			}
			else
			{
			?>
				<div id="boxThree">
					<div class="content"><h3>Ova kategorija trenutno nema igara.</h3></div>
				</div>
			<?php	
			}
			?>
	</div>
</section>
<?php
include_once('footer.html');
?>