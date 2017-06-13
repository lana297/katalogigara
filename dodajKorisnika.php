<?php 
include('header.php');
include_once('class.korisnik.php');

		if ( isset($_REQUEST['submit_btn']) )
			{
				$user = new korisnik();

				$registracija = $user->dodajKorisnika (array ( 	$_REQUEST['tip'],
																$_REQUEST['username'],
																$_REQUEST['password'],
																$_REQUEST['name'],
																$_REQUEST['lastname'],
																$_REQUEST['email'],
																$_REQUEST['pic']));
				if ($registracija)
				{
					echo "Registracija uspjela!<br />";
					echo '<a href="korisnici.php">Natrag na korisnike</a>';
				}
				else 
				{
					echo "Registracija nije uspjela..<br />";
					echo '<a href="dodajkorisnika.php">Natrag na registraciju</a>';
				}		
			}
	else
	{			
?>


<section>
	<div class="container">
		<div class="darkTwo">
		
	
<form method="POST" action="">
	<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
			<hr style="color:#f5e356;" />
			
				Tip id:</br>
					<select name="tip">
			
						<?php 
							$tipKor = new korisnik();
							$tipKor->tipKorisnikaNaziv();
						
							foreach($tipKor->tip_id as $key => $tip)
							{
								echo '<option value="'.$tip.'">'.$tipKor->tip_korisnika[$key].'</option>';
							}
						?>
					</select></br>
					
				Korisničko ime:	</br>
					<input  type="text" size="30" name="username" value="" required/><br />
					
				Lozinka: </br>
					<input type="password" size="30" name="password" value="" required/><br />
				
				Ime: </br>
					<input type="text" size="30"  name="name" value="" required/><br />
				
				Prezime: </br>
					<input type="text" size="30" name="lastname" value="" required/><br />
					
				Email: </br>	
					<input type="email" size="30" name="email" value="" required/><br />
					
				Slika: </br>
					<input type="url" size="30" name="pic" value="" required/><br />
							<hr style="color:#f5e356;" />	
					
				<input type="submit" name="submit_btn" class="button" value="Dodaj korisnika" />	
</form>				
		</div>
	</div>
</section>
<?php
	}
	include_once('footer.html');
?>

