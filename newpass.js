$(document).ready(function () //kada sse cijeli dokument ucita
{
    /*provjera da li je ponovljena lozinka jednaka lozinki*/
	
	// $ definiramo da pristupamo nekom elemntu
	//# znaci da je id
	//.val -spremi mi vrijednost koja je definirana u tom inputu
     $('#repeatPassword').focusout(function (event)// nakon sto izade iz tog polja aktivira se neka funkcija nad time
	{
        var lozinka = $('#password').val();
        var ponovljenaLozinka = $('#repeatPassword').val();
        if (lozinka === ponovljenaLozinka)
		{
            $('#repeatPassword').css("background", "palegreen");
            $("#jsGreskaPonovljenaLozinka").html(""); //.html = upisi u htmlu, tj je prazno polje, znaci nema nista u <p></p>
        }
        else 
		{
            $('#repeatPassword').css("background", "tomato");
            $("#jsGreskaPonovljenaLozinka").html("Ponovljena lozinka nije jednaka unesenoj lozinci"); // tu nije prazno polje u <p></p> se ispisuje greška
        }
    }
	);

   
}
);