<?php

class passvalidation 
{
	
	private $status = true;
	private $messages = array();
	
	public function check($password)
	{
		
		
		if(strlen($password["password"]) < 8) 
		{
			$this->messages['password'][] = "Lozinka mora imati najmanje 8 znakova";
			$this->status = FALSE;
		}
		
		if(!preg_match('#[0-9]#', $password["password"]))
		{
			$this->messages['password'][] = "Lozinka mora imati barem jedan broj";
			$this->status = FALSE;
		}
		 if(is_numeric($password["password"]))
		{
			$this->messages['password'][] = "Lozinka ne može sadržavati samo brojeve";
			$this->status = FALSE;
		}
		// if(!ctype_upper($password["password"]) && !ctype_lower($password["password"]))
		//{
		//	$this->messages['password'][] = "Lozinka mora imati min jedno veliko i min jedno malo slovo"; 
		//	$this->status = FALSE;
		//}   ////////////////////dakle ovdje se ova greska javlja cak i ako koristim jedno malo i jedno veliko slovo...
		if(!preg_match('#[a-z,č,ć,š,đ,ž]#', $password["password"]) || !preg_match('#[A-Z,Č,Ć,Š,Ž,Đ]#', $password["password"]))
		{
			$this->messages['password'][] = "Lozinka mora imati min jedno veliko i min jedno malo slovo";
			$this->status = FALSE;
		}
		if(!preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $password["password"]))
		{
			$this->messages['password'][] = "Lozinka mora imati barem jedan specijalni znak";
			$this->status = FALSE;
		}
		
		return $this->status;
	}
	
	public function getMsg()
	{
		return $this->messages; 
	}
}


?>