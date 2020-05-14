<?php namespace App\Controllers;

class User extends BaseController
{
	// protected $request;
	// public function __construct(RequestInterface $request)
 //    {
 //            $this->request = $request;
 //    }
	protected $media;
	protected $message;
	protected $request;
	protected $mediaCategory;
	protected $tags;
	protected $session;

	public function __construct()
    {
    	// $this->media =  new \App\Models\UserModel();
    	$this->userModel =  new \App\Models\UserModel();
    	$this->tags =  new \App\Models\TagsModel();
		
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->message = $this->getFlashMessage();
		$this->user = $this->session->get('user');
		

    }
	public function index()
	{	
		if (empty($this->user)) {
			$this->setFlashMessage( ["message"=>"No se encontró usuario", 'type' => "error", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to('/gtproj/user/login');
		}
		else
			return redirect()->to('/gtproj');
	}
	public function login(){
			// var_dump($this->message);
			// var_dump($this->message);
			if (!empty($this->message)) {
				echo view('login.php',['message' =>$this->message] );
			}
			else
				echo view('login.php');
			// echo "dentro";
		
		
	}
	public function loginprocess(){
		$logindata = $this->request->getPost();
		// $hashed_password = password_hash($logindata['password'], PASSWORD_DEFAULT);
		$vailidation = $this->userModel->auth($logindata['email'],$logindata['password']);
		// var_dump($vailidation);
		if ($vailidation != NULL) {
			unset($vailidation['password']);
			$this->session->set('user',	$vailidation);
			return redirect()->to('/gtproj/collection/mycollection');
		}
		else
			$this->session->setFlashdata('message',["message"=>"Usuario o contraseña incorrectos", 'type' => "error", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to('/gtproj/user/login');
		
	}
	public function logout(){
		$this->session->set('user', []);
		return redirect()->to('/gtproj');

	}

	public function register() {

	}

	

	
	

	//--------------------------------------------------------------------

}
