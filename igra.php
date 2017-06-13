<?php
include('header.php');
include('class.igre.php');	
if(isset($aktivni_korisnik_id))
{

?>			
	<section>
			<?php
				$igra = new games($_REQUEST['sifrai']);		
				$igra->ispisigre($_REQUEST['sifrai']);
				foreach ($igra->naziv as $key => $imeigre)
				{
			?>	
		<div class="container">	
			<div id="boxThree">
				<div class="content">
					<?php
						echo "<h2>".$imeigre."</h2>";
						echo "<hr/>";
						echo "<img src=".$igra->slika[$key]." />";
						echo "<p>".$igra->opis[$key]."</p>";
						echo '<video width="500" height:"300px" controls>
								<source src='.$igra->video[$key].' type="video/mp4">
							</video>';    
					?>
				</div>			
			</div>
		</div>
			<?php
				}	
			?>
		
	</section>

<?php
}
else 
{
	echo "<p>Samo registrirani korisnici mogu vidjeti ovaj sadržaj!</p>";
}

include('footer.html');

?>	