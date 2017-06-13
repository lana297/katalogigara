

<?php

class htmlTable
{
	public function ispisi($dataArray)
	{
		echo '<table border=10 style="margin:auto; background-color: gray; color: white; font-size: 17px;">';
		echo '<th style="background-color:rgb(62,62,62); color:#f5e356;">ID</th>
			<th style="background-color:rgb(62,62,62); color:#f5e356;">KORISNIČKO IME</th>
			<th style="background-color:rgb(62,62,62); color:#f5e356;">PREZIME</th>
			<th style="background-color:rgb(62,62,62); color:#f5e356;">E-MAIL</th>
			<th style="background-color:rgb(62,62,62); color:#f5e356;">TIP</th>
			<th style="background-color:rgb(62,62,62); color:#f5e356;">SLIKA</th>

			<th style="background-color:rgb(62,62,62); color:#f5e356;">Opcija</th>';
		foreach ($dataArray as $row)
		{
			echo '<tr>';
			
			foreach ($row as $cell)
			{
				echo '<td>' . $cell . '</td>';			
			}
		
			echo '</tr>';
		}
		echo '</table>';
	}
}
?>
