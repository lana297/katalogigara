<?php 
include('header.php');
include_once('class.pretplate.php');

?>
<section>
		<?php
			$pretplata = new pretplate();		
			$popis_pretplata = $pretplata->aktivnepretplate($aktivni_korisnik_id);
			

			if ($popis_pretplata->num_rows){
				foreach ((array)$pretplata->naziv as $key => $imeigre)
				{
			?>
					<div class="container">
						<div id="boxThree">
							<div class="content">
								<?php
									echo '<h2><a style="text-decoration: none;" href="igra.php?sifrai='.$pretplata->id[$key].'">'.$imeigre.'</a></h2>';
									echo "<hr/>";
									echo "<img src=".$pretplata->slika[$key]." />";
									echo "<p>".$pretplata->opis[$key]."</p>";

								?>
							</div>
						</div>
					</div>
				<?php
				}
			}
			else{
				?>
				<div class="container">
						<div id="boxThree">
							<div class="content"><h3>Nemate niti jednu pretplatu!</h3></div>
						</div>
				</div>
			<?php
			}
			?>
</section>
	
<?php
include('footer.html');
?>	