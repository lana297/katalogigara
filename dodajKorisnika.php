<?php 
include('header.php');
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
		if(strpos($url, 'error=picerror') !== FALSE)
		{
			$_SESSION['imgerror'] = "Podržani formati su: .jpg, .jpeg i .gif! </br> Molimo odaberite fotografiju sa jednim od navedenih formata.</br></br>";
			$imgerror = $_SESSION['imgerror'];
		}		
				
////////////////////////////SUBMIT_BTN//////////////////////////////////////////////				
		
			$password = "";
			$status = "";
		
		if ( isset($_REQUEST['submit_btn']) )
		{

				//$pathh = "";
				$user = new korisnik();
				$emailvalid = TRUE;
				$passvalid = TRUE;
				$errorFile = "";
				$fileDestination = "";
				
				
				$obj = new passvalidation();
				$passvalid = $obj->check($_REQUEST);
				
			
				
				
				
				if($passvalid === TRUE)
				{	
				if(isset($_POST['email']) == true && empty($_POST['email']) == false)
				{ 
					$email = $_POST['email'];
					
					if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
				
					{
						$errorFile = "email je pogrešan";
						$emailvalid = FALSE;
						header("Location:dodajKorisnika.php?error=notvalid");
					}
				}
				}
				else {
					$greske = array();
					foreach ($obj->getMsg() as $k=>$v){
						$greske[] = $v;
					}
					$_SESSION['passError'] = $greske;
					$errorFile = "lozinka je pogrešna";
					header("Location:dodajKorisnika.php?error=passerror");
				}


		if($emailvalid === TRUE)
		{
			/////////////////////////////pohranjivanje slika!!!!!!!!!!!!!!!!!!!!!!!!!!!/////////////////////////////////////////////
			if(isset($_FILES['pic']['name']))
			{
					$fileName= $_FILES['pic']['name'];
					$tmp_name = $_FILES['pic']['tmp_name'];
					$fileSize = $_FILES['pic']['size'];
					$fileError = $_FILES['pic']['error']; 
					$fileType = $_FILES['pic']['type'];
					
					$fileExt = explode('.', $fileName);
					$fileActualExt = strtolower(end($fileExt)); //radi jpg I JPG //end last from array
					
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
							$errorFile = "Doslo je do progresle kod uploada";
						}
					}
					else
					{
						if( !empty($_FILES['pic']['name'])){
							$errorFile = "Pogresan format slike";
							
							header('Location:dodajKorisnika.php?error=picerror');
						}
					}
			}	
		}
		
		
	
		
		
			//ovo je izbaceno izvan if-a za validaciju maila
			////////////////////////////////registracija ako je sve gore uspjelo////////////////////////////////	
				
				//ako je errorFile prazan, znači da je prošao validaciju maila i slike
		if ($errorFile == "")
			{
				$user = new korisnik();
				$nekiString = 'adewn54aghng57346asd6a';
				$salt = '$2y$11$' . $nekiString;
				$registracija = $user->dodajKorisnika (array ( 	$_REQUEST['tip'],
																	$_REQUEST['username'],
																	substr(crypt($_REQUEST['password'], $salt), 0, 45),																	
																	$_REQUEST['name'],
																	$_REQUEST['lastname'],
																	$_REQUEST['email'],
																	$fileDestination,
																	"",
																	1));
				if ($registracija)
				{
					echo "Registracija uspjela!<br />";
					header("Location: korisnici.php");
				}

				else 
				{
					echo "Registracija nije uspjela..<br />";
					echo '<a href="dodajkorisnika.php">Natrag na registraciju</a>';
				}		
			}
		else
		{
			echo $errorFile;
		}
	}
	else
	{			
?>


<section>
	<div class="container">
		<div class="darkTwo">
		
	
<form enctype="multipart/form-data" method="POST" action="">
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
					<input  type="text" size="30" name="username" value="" /><br />
					
				Lozinka: </br>
					<input type="password" size="30" name="password" value="<?php echo $password; ?>" /><br /> 
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
					<input type="text" size="30"  name="name" value="" /><br />
				
				Prezime: </br>
					<input type="text" size="30" name="lastname" value="" /><br />
					
				Email: </br>	
					<input type="text" size="30" name="email" value="" /><br />
					
				<?php if(isset($emailerror))
						{
							echo $emailerror;
						}   ?>	
			</br> 
			Slika: </br></br>

			<?php   if(isset($imgerror) | !empty($_FILES['pic']['name']))
						{
							echo $imgerror; 
						}  ?>

			
				<input type="file" name="pic" id="pic" value="">
				
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

