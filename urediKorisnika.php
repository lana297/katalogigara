<?php
include_once('header.php');
include_once('class.korisnik.php');


if(isset($_REQUEST['del_btn']))
	{
		
		$delete = new korisnik();
		$del = $delete->deletepic($_SESSION['user_id']);
	
		if ($del == 1) echo "Uspjelo";
		else echo $del;
	}	
	
	////////////////////
if(isset($_REQUEST['submit_btn']))
{
	$pathh = "";
	$user = new korisnik();

	
	
	if(isset($_FILES['pic']['name']))
	{
		
	$pathh = "korisnici/" . $_FILES['pic']['name'];
	$target = __DIR__ . "/korisnici/";
	$tmp_name = $_FILES['pic']['tmp_name'];
	$name = basename($_FILES["pic"]["name"]);
	
	
	if (move_uploaded_file($tmp_name, "$target/$name")) 
	
	{
		echo "Uspjelo!";
	}
	
	else 
	{
		echo "Pohranjivanje slike nije uspjelo";
	}

	} 


	
	$update = $user->urediKorisnika( array ($_REQUEST['id'],
											$_REQUEST['tip_id'],
											$_REQUEST['username'],
											$_REQUEST['password'],
											$_REQUEST['name'],
											$_REQUEST['lastname'],
											$_REQUEST['email'],
											 $pathh));
																				
										
	if($update == 1)
		{
			echo "Korisnik je uspješno ažuriran!</br>";
			echo '<a href="korisnici.php">Natrag na korisnike</a>';
		}		
	else 
		{
			echo "Ažuriranje korisnika nije uspjelo. Tekst greške: ". $update ."</br>";
			echo '<a href="korisnici.php">Natrag na korisnike<a/>';
		}
}	
//////////////////////

else 
{
	$kor = new korisnik();
	$kor->korisnik_id($_REQUEST['sifrakor']); 
	foreach ($kor->korisnik_id as $key => $sifra)
	{}
?>


<section>
	<div class="container">
		<div class="darkTwo">
		
	
<form method="POST" action="" enctype="multipart/form-data">
	<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite potrebne podatke</h2>
			<hr style="color:#f5e356;" />
			
				<input type="hidden" name="id" value="<?php echo $sifra?>" />
			<?PHP
			
				$_SESSION['user_id'] = $sifra;
			?>
				Tip id:</br>
					<select name="tip_id">
					
					<?php
					$tipKor = new korisnik();
					$tipKor->tipKorisnikaNaziv();
					foreach($tipKor->tip_id as $kljuc => $tip)
					{
					?>					
						<option value="<?php echo $tip;?>" <?php echo ($tip ==  $kor->tip_id[$key]) ? ' selected="selected"' : '';?>><?php echo $tipKor->tip_korisnika[$kljuc];?></option>
					<?php
					}
					?>			

					</select></br>
					
				Korisničko ime:	</br>
					<input type="text" name="username" size="30" value="<?php echo $kor->korisnicko_ime[$key] ?>" /> </br> 

				Lozinka: </br>
					<input type="password" name="password" size="30" value="<?php echo $kor->lozinka[$key];?>" /></br>
				
				Ime: </br>
					<input type="text" name="name" size="30" value="<?php echo $kor->ime[$key] ?>" ><br />
				
				Prezime: </br>
					<input type="text" name="lastname"  size="30" value="<?php echo $kor->prezime[$key] ?>" /><br />
					
				Email: </br>	
					<input type="email" name="email" size="30" value="<?php echo $kor->email[$key] ?>" /><br />
				
	
				Slika: </br></br>
						
			<?php
				$pic = $kor->slika[$key];

				if (!empty($pic))
				{
					echo "<img src=".$pic.">";
					echo '<input type="submit" name="del_btn" value="obriši"  />';
				}
				else
				{
			?>
				<input type="file" name="pic" id="pic" value="">
					
			<?php 
				}
			?>

				
			
			
				<hr style="color:#f5e356;" />		
				<input type="submit" name="submit_btn" class="buttonTwo" value="Spremi ažurirane podatke" />	
</form>				
		</div>
	</div>
</section>
<?php 
}
include_once('footer.html'); 
?>