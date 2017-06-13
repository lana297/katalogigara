<?php 
	include('header.php');
	include_once('class.KategorijeUzrasta.php');

?>

<section id="boxesCont">
	<div class="container">
	
		<?php 
		
		if($aktivni_korisnik_tip == 0)
		{
		?>
			
		<section>
			<div class="dark">
				<a class="buttonTwo" href="dodajnovukategoriju.php">Dodaj novu kategoriju</a>
			</div>	
		</section>
	
		<?php	
		}
			$kategorije = new kategorije();
			$kategorije->sveKategorije();

			foreach ($kategorije->id_kategorije as $key=>$sifra)
			{
		?>
		<div class="box">
		<div class="opis">
			<?php

				$kategorija = '<h3><a href="popisIgara.php?sifrak='.$sifra.'">'.$kategorije->naziv_kategorije[$key].'</a></h3>';
				$opis = '<i>'.$kategorije->opis_kategorije[$key].'</i>';
			?>
			
		
			
			<div class="nameDescWrapper">
			<?php
				echo $kategorija;
				echo $opis;
			?>
			</div>
			</div>
			<?php
				echo "<hr/>";
				echo "<p>Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. Lorem Ipsum postoji kao industrijski standard još od 16-og stoljeća.</p> ";
				

			if($aktivni_korisnik_tip == 0)
			{
				echo "<hr/>";
				echo '<a class="button" style="color: black; font-size:20px;"href="urediKategoriju.php?sifrak='.$sifra.'">Uredi</a>';
			}	
	?>
		</div>
		<?php
			}
		?>
	</div>
	</section>
	
<?php			
include('footer.html');
?>
	
</body>
</html>	

