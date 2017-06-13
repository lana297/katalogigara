<?php 
include_once('header.php');
include_once('class.KategorijeUzrasta.php');

		$kategorije = new kategorije();
		$kategorije->moderatorKategorije($aktivni_korisnik_id);
?>

<section id="boxesCont">
	<div class="container">
		<section>
				<div class="dark">
					<?php 
						$kategorije = new kategorije();
						$kategorije->moderatorKategorije($aktivni_korisnik_id);
						echo '<a class="buttonTwo" href="dodajnovuigru.php?id='.$aktivni_korisnik_id.'">Dodaj novu igru</a>';
					?>
				</div>	
			</section>
	
		<?php	
		$kategorije = new kategorije();
		$kategorije->moderatorKategorije($aktivni_korisnik_id);
		
		foreach ($kategorije->moderator_kategorije as $key=>$sifra)
		{
		?>
		<div class="box">
		<?php
			
			$kategorija = '<h3 style="font-family:Amatic SC,cursive;color:#f5e356; font-size:30px;">'.$kategorije->naziv_kategorije[$key].'</h3>';
			$opis = '<i class="opis2">'.$kategorije->opis_kategorije[$key].'</i>';
		?>
			<div class="opis">
			<?php	
				echo $kategorija;			
				echo $opis;
			?>
			</div>	
			<?php
				echo "<hr/>";
				echo "<p>Lorem Ipsum je jednostavno probni tekst koji se koristi u tiskarskoj i slovoslagarskoj industriji. Lorem Ipsum postoji kao industrijski standard još od 16-og stoljeća.</p> ";
				echo "<hr/>";
				echo '<a class="button" style="color:black; font-size: 20px;" href="popisIgaraIkorisnika.php?sifrak='.$kategorije->id_kategorije[$key].'">Popis igara i pretplatnika</a>';
		
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