<?php
include_once('header.php');
include_once('class.korisnik.php');
include_once('class.validpass.php');


//////////////////////redirekcija i email greska////////////////////////////////////	
	
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url, 'error=notvalid') !== FALSE)
		{
			$_SESSION['emailerror'] = "Unesite valjanu email adresu!";
			$emailerror = $_SESSION['emailerror'];
		}

/////////////////////redirekcija i pass greske ////////////////////

		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url, 'error=passerror') !== FALSE)
		{
			$passerrors = $_SESSION['passError'];
		}
////////////////////////////////////////////////////////////////////

var_dump($_SERVER['REQUEST_URI']);

if(isset($_REQUEST['submit']))
{
	

	
	$emailvalid = TRUE;
	$passvalid = TRUE;
	$errorFile = "";
	

	$obj = new passvalidation();
	$passvalid = $obj->check($_REQUEST);
	
	
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
				//header("Location:newpass.php?error=notvalid");
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
		//header("Location:newpass.php?error=passerror");
	}
	
	if($emailvalid === TRUE)
	{
	
	if($errorFile == "")
	{
		$user = new korisnik();
		$nekiString = 'adewn54aghng57346asd6a';
		$salt = '$2y$11$' . $nekiString;
		
		$update = $user->setNewPass( array ("",
											"",
											"",
											"",
											"",
											"",
											$_REQUEST['email'],
											"",
											substr(crypt($_REQUEST['password'], $salt), 0, 45)));
											
		mail($_REQUEST['email'], "Aktivacija", "Vaš kod za aktivaciju je dostupan na sljedecem linku: http://localhost/0PRAKSA/0307/proba/aktivacija.php?email=".substr(crypt($_REQUEST['email'], $salt), 0, 45));									
		
		echo "vardump kriptiranog maila";
		var_dump(substr(crypt($_REQUEST['email'], $salt), 0, 45));									
		//var_dump($_REQUEST['email']);									
		
			////////////////////////////podaci za aktivaciju//////////////
			
			
			
			
	$_SESSION['authmail'] = $_REQUEST['email'];
	$_SESSION['authpass'] = substr(crypt($_REQUEST['password'], $salt), 0, 45);
	

	echo "session authmail";
	var_dump($_SESSION['authmail']);
	echo "session authpass";
	var_dump($_SESSION['authpass']);
	
	////////////////////////////////////////////////////////////////////////////
	
	
	if($update == 1)
	{
		echo "Uspjelo";
		//header("Location:index.php");
	}
	else
	{
		echo "Ažuriranje lozinke nije uspjelo. Tekst greške: ". $update ."</br>";
		echo '<a href="newpass.php">Natrag na formular<a/>';
	}
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

			<form method="POST" action="">
				<h2 style="	font-family: 'Amatic SC', cursive; color:#f5e356; font-size:35px;">Unesite novu lozinku</h2>
				<hr style="color:#f5e356;" />
						
				Unesite svoju email adresu: </br>		
				<input type="text" name="email" size="30"  value="" /> </br>
				<?php 	
						if(isset($emailerror))
						{
							echo $emailerror;
						}   
						?>	
				</br>
				Unesite novu lozinku: </br>
				<input type="password" name="password" id="password" size="30" value="" /></br>
					<?php
					if(isset($passerrors))
						{
							foreach ($passerrors as $item)
							{
								foreach ($item as $k=>$v)
								{
									echo $v."<br>";
								}
							}
						}
					?>
						
					<p id="jsGreskaPonovljenaLozinka"></p>
				Unesite ponovljenu lozinku: </br>
				<input type="password" name="repeatPassword" id="repeatPassword" size="30" value="" /></br>
						<hr style="color:#f5e356;" />
					<input type="submit" name="submit" class="buttonTwo" value="Spremi ažurirane podatke" />	
			</form>	
					
		</div>
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="newpass.js"></script> <!-- na kraj jer je brzi od htmla, te je to jedini nacin da budemo sigurni da ce se ucitati svi elementi

<?php 
} 
include_once('footer.html'); 
?>		