<?php 
include_once('header.php');
include_once('class.igre.php');
?>
	
<section>
<div class="container">
	<div class="containerThree">

		<?php
			$igre = new games($_REQUEST['sifrak']);			
			$popis = $igre->igrePoKategorijama($_REQUEST['sifrak']);
		

			if ($popis->num_rows != 0)
			{
				foreach ($igre->naziv as $key => $imeigre)
				{
	?>				<div id="boxThree">
						<div class="content">
						<?php
						
					
							echo '<h2>'.$imeigre.'</h2>';
								echo "<hr/>";
								echo "<img src=".$igre->slika[$key]." />";
								echo "<p id='opis'>".$igre->opis[$key]."</p>";
								echo "<a href=".$igre->video[$key]."></a>";
								echo "<hr/>";
								echo '<a class="button" style="color:black; font-size: 20px;,;" href="urediIgru.php?sifrai='.$igre->igra_id[$key].'">Uredi</a>';
							?>
						</div>
					</div>
	<?php
				}	
			}
			else
			{
				?>
				<div id="boxThree">
					<div class="content"><h3>Nema igara u odabranoj kategoriji!</h3></div>
				</div>
				<?php
			}
?>
</div>

<aside id="side">

		<?php
			echo "<h3>Pretplaćeni korisnici</h3></br>";

				
			include_once('class.pretplate.php');
			$pretplatnici = new pretplate();
			$popis_pretplatnika = $pretplatnici->pretplatniciUzrasta($_REQUEST['sifrak']);
			
			echo "<table>";
				echo "<tr>
						<th>ID</th>
						<th>Ime</th>
						<th>Prezime</th>
					</tr>";

			if ($popis_pretplatnika->num_rows != 0)
			{
				foreach ($pretplatnici->id as $key=>$id)
				{
					echo "<tr>
						<td>".$id."</td>
						<td>".$pretplatnici->ime[$key]."</td>
						<td>".$pretplatnici->prezime[$key]."</td>
						</tr>";
				}
			}
			else
			{
				echo "<tr><td colspan='3'>Nema pretplatnika u ovoj kategoriji!</td></tr>";
			}
			echo "</table>";
			
			?>	

</aside>			
</div>

</section>	
		