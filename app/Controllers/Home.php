<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{	
		$data = [];
		$data['welcome_message'] = ["dato1" => "dato1", "dato2"=>"comer", "dato3" => "comer"];
		$data['footer'] = ["footer1" => "copyrigth"];
		$this->render('welcome_message',$data);	
	}

	public function connect(){
		$db = \Config\Database::connect();
		 $error = "no error";
		if ($db->simpleQuery('SELECT * FROM test'))
		{
		        echo "Success!";
		        var_dump($db);
		}
		else
		{
				 $error = $db->error();
		        echo var_dump($error);
		}
				$db->close();
	}
	

	//--------------------------------------------------------------------

}
