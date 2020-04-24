<?php namespace App\Controllers;

class Home extends BaseController
{
	// protected $request;
	// public function __construct(RequestInterface $request)
 //    {
 //            $this->request = $request;
 //    }
	public function index()
	{	
		$data = [];
		
		$data['footer'] = ["footer1" => "copyrigth"];
		
		$media =  new \App\Models\MediaModel();
		$media->getMedia();
		echo "<pre>";
		var_dump($media);
		echo "</pre>";
		$data['welcome_message'] = ["media" => $media];
		//$this->render('welcome_message',$data);	
	}

	public function insertMedia() {
		$request->getGet();
		var_dump($request);
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
