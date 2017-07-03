 <?php
	
	//error_reporting(0);
	
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
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url, 'error=empty') !== FALSE )
		{
			echo "Niste ispunili sva polja!";
			//$_SESSION['new'] = "<a class='link' href='newpass.php?'>Zaboravljena lozinka?</a>";
			//$new = $_SESSION['new'];
		}
				
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url, 'error=wrongpass') !== FALSE )
		{
			$_SESSION['new'] = "<a class='link' href='newpass.php?'>Zaboravljena lozinka?</a>";
			$new = $_SESSION['new'];
		}		
				
				
				
		if($aktivni_korisnik===0) 
		{
	
				if(isset($_POST['submit_btn']))
				{

					if(empty($_POST['email'])) 
					{

						header("Location:index.php?error=empty");
						exit();

					}
					
					if(empty($_POST['password'])) 
					{
						header("Location:index.php?error=empty");
						exit();
					}
					//elseif (!isset($_POST['password']))
					//{
					//	header("Location:index.php?error=empty");
					//	exit();
					//}
					
					
				else 
				{
						include_once('class.korisnik.php');
						$nekiString = 'adewn54aghng57346asd6a';
						$salt = '$2y$11$' . $nekiString;
						$pass = crypt($_POST['password'], $salt);
						$pass = substr($pass, 0, 45);
			
						$korisnik = new korisnik();
					
					if($korisnik->login($_POST['email'],  $pass))
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
					else 
					{
						header("Location:index.php?error=wrongpass");
						exit();
					}	
				}
				}
					
			 ?>
			<form method="POST" action="">
				<input type="text" name="email" placeholder="Unesite email" value=""  />
				<input type="password" name="password" placeholder="Unesite lozinku" value=""  />
				<input type="submit" name="submit_btn" class="button" value="Prijavi se" />
				</br>
				<input type="checkbox" name="remember" /> Zapamti me
				<?php
					if(isset($new))
					{
						echo $new;
					}
				?>
				
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




