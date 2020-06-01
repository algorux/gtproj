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
	protected $UserModel;
	protected $tags;
	protected $session;
	protected $email;

	public function __construct()
    {
    	// $this->media =  new \App\Models\UserModel();
    	$this->userModel =  new \App\Models\UserModel();
    	$this->tags =  new \App\Models\TagsModel();
		
		$this->request = \Config\Services::request();
		$this->session = \Config\Services::session();
		$this->message = $this->getFlashMessage();
		$this->user = $this->session->get('user');
		$this->email = \Config\Services::email();
		

    }
	public function index()
	{	
		if (empty($this->user)) {
			$this->setFlashMessage( ["message"=>"No se encontró usuario", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
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
			$this->session->setFlashdata('message',["message"=>"Usuario o contraseña incorrectos", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to('/gtproj/user/login');
		
	}
	public function logout(){
		$this->session->set('user', []);
		return redirect()->to('/gtproj');

	}

	public function register() {
		$this->session->set('session_confirm', rand(0, 99999));
		echo view('register.php',['session_confirm' => $this->session->get('session_confirm')]);
	}

	public function registration(){
		$petition_info = $this->request->getPost();
		// var_dump($this);
		if ($petition_info['session_confirm'] == $this->session->get('session_confirm')) {
			$petition_info['password'] = password_hash($petition_info['password'], PASSWORD_DEFAULT)."\n";
			$date = new \DateTime($petition_info['birthday']);
			$petition_info['birthday'] = $date->format('Y-m-d H:i:s');
			unset($petition_info['confirm_password']);
			unset($petition_info['session_confirm']);

			$userModel =  new \App\Models\UserModel();
			$petition_info = $userModel->addUser($petition_info);
			if ($petition_info['id'] != 0) {
				unset($petition_info['password']);
				$this->session->set('user',	$petition_info);
				$this->session->setFlashdata('message',["message"=>"Éxito al registrar " . $petition_info['username'], 'type' => "success", "icon" => "fas fa-check"]);
				return redirect()->to('/gtproj/');
			}
			else
			{
				$this->session->setFlashdata('message',["message"=>"Error de servidor al registrar", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
				return redirect()->to('/gtproj/');
			}
			// var_dump($petition_info);
		}
		else
		echo "Error petición no válida";
		$this->session->remove('session_confirm');
	}

	

	
	

	//--------------------------------------------------------------------

}
