<?php
include_once('header.php');

include_once('class.korisnik.php');
include_once('class.htmltable.php');

$ekspert = new korisnik();
$ekspert->topEkspert();

?>

<section>
				<div class="dark">
					<p>Najviše postavljenih igara:</p>
					<?php
						echo $ekspert->top;
						echo "-";
						echo $ekspert->korisnicko_ime; 
						echo $ekspert->prezime
					?>
				</div>	</section>
			
<?php
include_once('footer.html');			