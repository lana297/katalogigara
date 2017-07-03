<?php
include_once('header.php');
include_once('class.korisnik.php');
include_once('class.validpass.php');


/////////////////////redirekcija i pass greske ////////////////////

		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url, 'error=passerror') !== FALSE)
		{
			$passerrors = $_SESSION['passError'];
		}

	
	//////////////////////redirekcija i email greska////////////////////////////////////	


	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if(strpos($url, 'error=notvalid') !== FALSE)
	{
		$_SESSION['emailerror'] = "Unesite valjanu email adresu!";
		$emailerror = $_SESSION['emailerror'];
	}	
	
	/////////////////////redirekcija i greska za slike ////////////////////
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		//var_dump($_SERVER['REQUEST_URI']);
		if(strpos($url, 'error=picerror') !== FALSE)
		{
			$_SESSION['imgerror'] = "Podržani formati su: .jpg, .jpeg i .gif! </br> Molimo odaberite fotografiju sa jednim od navedenih formata.</br></br>";
			$imgerror = $_SESSION['imgerror'];
		}	
		
		
	///////////////////////////////////////brisanje slike/////////////////////////////////////////
	if(isset($_REQUEST['del_btn']))
		{
			$delete = new korisnik();
			$del = $delete->deletepic($_REQUEST['id']);
		
			if ($del != 1) 
			{ 
				echo $del;
			}	
		}		

	
	
///////////////////////submit//////////////////////////////////////////





	
if(isset($_REQUEST['submit_btn']))
{
	$pathh = "";
	$emailvalid = TRUE;
	$passvalid = TRUE;
	$errorFile = "";
	$fileDestination = "";
	
	if(!empty($_POST['password']))
	{
		$obj = new passvalidation();
		$passvalid = $obj->check($_REQUEST);
	}
		
	
	//////emailvalidacija////////
	
	if($passvalid === TRUE)
	{
	if(isset($_POST['email']) == true && empty($_POST['email']) == false)
	{ 

		$email = $_POST['email'];
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE)
		{
			$errorFile = "email je pogrešan";
			$emailvalid = FALSE;
			header("Location:urediKorisnika.php?sifrakor=".$_POST['id']."&error=notvalid");
		}
	}
	}
	else
	{
		$greske = array();
		foreach ($obj->getMsg() as $k=>$v)
		{
			$greske[] = $v;
		}
		$_SESSION['passError'] = $greske;
		$errorFile = "lozinka je pogrešna";
		header("Location:urediKorisnika.php?sifrakor=".$_POST['id']."&error=passerror");
	}
	
	
	
	
	
/////////////////////


	if($emailvalid === TRUE)
	{
		
			////pohranivanja slika///// ako je došlo do novog uploada
		if(isset($_FILES['pic']['name']))
		{

			$fileName= $_FILES['pic']['name'];
			$tmp_name = $_FILES['pic']['tmp_name'];
			$fileSize = $_FILES['pic']['size'];
			$fileError = $_FILES['pic']['error']; 
			$fileType = $_FILES['pic']['type'];
						
			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt)); //radi jpe I JPG //end last from array
						
			$allowed = array('jpg', 'jpeg', 'png');
						
			if(in_array($fileActualExt, $allowed))
			{
				if($fileError === 0)
				{
					if($fileSize < 1000000)
					{
						$fileNameNew = uniqid('', true) . "." . $fileActualExt;

						$_SESSION['filename'] = $fileNameNew;
						$fileDestination = 'korisnici/'.$fileNameNew;
						move_uploaded_file($tmp_name, $fileDestination);
						echo "premjesteno";
					}
					else
					{
						$errorFile = "file is too big";
					}
				}
	 
				else
				{
					$errorFile = "Došlo je do progreške kod uploada";
				}
			}
			else
			{
				if(!empty($_FILES['pic']['name']))
				{	
				$errorFile = "Pogresan format slike";
				header("Location:urediKorisnika.php?sifrakor=".$_POST['id']."&error=picerror");
			}
			}
		}
		//ako je nije postavljen FILES, provjerava se da li korisnik već ima sliku, POST-ana je u submitu
		elseif (isset($_POST['pic'])) $fileDestination = $_POST['pic'];
	}

	if($errorFile == "")
	{
		$user = new korisnik();
		if(!empty($_POST['password']))
		{	
			$user = new korisnik();
			$nekiString = 'adewn54aghng57346asd6a';
			$salt = '$2y$11$' . $nekiString;	

			$update = $user->urediKorisnikaPass( array ($_REQUEST['id'],
													$_REQUEST['tip_id'],
													$_REQUEST['username'],
													substr(crypt($_REQUEST['password'], $salt), 0, 45),
													$_REQUEST['name'],
													$_REQUEST['lastname'],
													$_REQUEST['email'],
													 $fileDestination));
		}	
		else 
		{
			$update = $user->noPass( array ($_REQUEST['id'],
													$_REQUEST['tip_id'],
													$_REQUEST['username'],
													"",
													$_REQUEST['name'],
													$_REQUEST['lastname'],
													$_REQUEST['email'],
													 $fileDestination));
		}		
										
	if($update == 1)
		{
			header("Location:korisnici.php");
		}
			
	else 
		{
			echo "Ažuriranje korisnika nije uspjelo. Tekst greške: ". $update ."</br>";
			echo '<a href="korisnici.php">Natrag na korisnike<a/>';
		}
	}
	else
	{
		echo $errorFile;
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
					<input type="password" name="password" size="30" value="" /></br>
					<?php
						if(isset($passerrors))
						{
							
							foreach ($passerrors as $item)
							{
								foreach ($item as $k=>$v){
									echo $v."<br>";
								}
							}
						}
					?>
				
				Ime: </br>
					<input type="text" name="name" size="30" value="<?php echo $kor->ime[$key] ?>" ><br />
				
				Prezime: </br>
					<input type="text" name="lastname"  size="30" value="<?php echo $kor->prezime[$key] ?>" /><br />
					
				Email: </br>	
					<input type="text" name="email" size="30" value="<?php echo $kor->email[$key]; ?>" /><br />
				
		<?php		if(isset($emailerror))
					{
						echo $emailerror;
					}
		?>	
	
				Slika: </br></br>
						
			<?php
				$pic = $kor->slika[$key];
				
						  if(isset($imgerror) | !empty($_FILES['pic']['name']))
						{
							echo $imgerror; 
						}  

				if (!empty($pic))
				{
					echo "<img src=".$pic.">";
					echo "<input type='hidden' name='pic' id='pic' value=" . $pic . ">";
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