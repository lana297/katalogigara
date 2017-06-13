<?php



define("DB_HOST", "localhost");
define("DB_USER", "iwa_2015");
define("DB_PASS", "foi2015");
define("DB_DBASE", "iwa_2015_zb_projekt");


class baza extends mysqli
{
	public function __construct($baza = DB_DBASE)
	{
		parent::__construct(DB_HOST, DB_USER, DB_PASS, $baza);
		$this->set_charset('utf8');
	}
	



}

?>


