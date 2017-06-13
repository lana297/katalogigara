 <?php
	
	error_reporting(0);
	
	if (session_id() == "")
	session_start();

	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	
	if(isset($_SESSION['aktivni_korisnik'])) 
	{
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id = $_SESSION["aktivni_korisnik_id"];
	}	
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Katalog igara</title>
    <link href="./styles/globalCSS.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,7s00" rel="stylesheet">
</head>
<body>


	<header>
		<section id="login">
		<div class="containerTwo">
	
		
		<?php 
			if ($aktivni_korisnik===0) 
				{
					include_once('class.korisnik.php');

	
	if (isset($_POST['submit_btn']) )
			{
				$korisnik = new korisnik();
			if ( $korisnik->login($_POST['username'],  $_POST['password']) )
				{
					session_start();
					
					$_SESSION['aktivni_korisnik']= $korisnik->korisnicko_ime;
					$_SESSION['aktivni_korisnik_ime']= $korisnik->ime . " " .$korisnik->prezime;
					$_SESSION['aktivni_korisnik_id']= $korisnik->korisnik_id;
					$_SESSION['aktivni_korisnik_tip']= $korisnik->tip_id;
					
					if ($_SESSION['aktivni_korisnik_tip'] == 0)
						header("Location:korisnici.php");
					elseif ($_SESSION['aktivni_korisnik_tip'] == 1)
						header("Location:mojekategorije.php");
					else 
						header("Location:mojeigre.php");
				
					
				}
			}
					
			 ?>
			<form method="POST" action="">
				<input type="text" name="username" placeholder="Unesite korisničko ime" value="" required />
				<input type="password" name="password" placeholder="Unesite lozinku" value=""  required />
				<input type="submit" name="submit_btn" class="button" value="Prijavi se" />
			</form>	
		<?php
				}
			else 
				{
					echo "Dobrodošli, $aktivni_korisnik_ime <br/>";
					echo "<a class='link' href='logout.php'>odjava</a>";
			}
				
		?>
		</div>
		</section>
	
			<div class="HeaderContainer" >
			<div class="headerInfo">
					<h1><span class="highlight">Katalog igara</span></h1>
			</div>
				<nav>
					<ul>
						<li><a href='index.php'>Početna</a></li>
						<li><a href='kategorijeUzrasta.php'>Kategorije uzrasta</a></li>
					
						<?php 
					
							switch($aktivni_korisnik_tip)
							{
								case 0:
										echo '<li><a href="korisnici.php">Korisnici</a></li>';
										echo '<li><a href="eksperti.php">Eksperti</a></li>' ;
										break;
								
								case 1:
										echo '<li><a href="mojekategorije.php?id='.$aktivni_korisnik_id.'">Moje kategorije</a></li>';
										break;
								
								case 2:
										echo '<li><a href="mojeigre.php">Moje igre</a></li>' ;
										break;
							}
						?>
						<li><a href='o_autoru.php'>O autoru</a></li>
					</ul>
				</nav>
			</div>	
	</header>




