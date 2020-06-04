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
		$id = $this->request->getGet('id', FILTER_SANITIZE_SPECIAL_CHARS);
		if ($id == 0) {
			$this->setFlashMessage( ["message"=>"No se encontró usuario", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to(base_url().'/user/login');
		}
		$data['userprofile'] = $this->userModel->find($id);

		if (!empty($this->user) && $this->user['id'] == $id)
			$data['userprofile']['canedit'] = 1;#canedit;
		else
			$data['userprofile']['canedit'] = 0;#canedit;

		$data['header']['user'] = $this->user;
		$data['header']['message'] = $this->message;
		$this->render('userprofile',$data);
			
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
		$logindata = $this->request->getPost(null, FILTER_SANITIZE_SPECIAL_CHARS);
		// $hashed_password = password_hash($logindata['password'], PASSWORD_DEFAULT);
		$vailidation = $this->userModel->auth($logindata['email'],$logindata['password']);
		// var_dump($vailidation);
		if ($vailidation != NULL) {
			unset($vailidation['password']);
			$this->session->set('user',	$vailidation);
			return redirect()->to(base_url().'/collection/mycollection');
		}
		else
			$this->session->setFlashdata('message',["message"=>"Usuario o contraseña incorrectos", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
			return redirect()->to(base_url().'/user/login');
		
	}
	public function logout(){
		$this->session->set('user', []);
		return redirect()->to(base_url());

	}

	public function register() {
		$this->session->set('session_confirm', $this->generateRandomString());
		echo view('register.php',['session_confirm' => $this->session->get('session_confirm')]);
	}

	public function registration(){
		$petition_info = $this->request->getPost(null, FILTER_SANITIZE_SPECIAL_CHARS);
		// var_dump($this);
		if ($petition_info['session_confirm'] == $this->session->get('session_confirm')) {
			/////////////////////////Checar legalidad del registro
			$prev_user = $this->userModel->where('email',$petition_info['email'])->first();
			if ($prev_user != null) {
				$this->session->setFlashdata('message',["message"=>"El correo ya existe", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
				return redirect()->to(base_url());
			}
			$prev_user = $this->userModel->where('username',$petition_info['username'])->first();
			if ($prev_user != null) {
				$this->session->setFlashdata('message',["message"=>"El nombre de usuario ya existe", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
				return redirect()->to(base_url());
			}
			/////////////////////////////////
			//hashear password
			$petition_info['password'] = password_hash($petition_info['password'], PASSWORD_DEFAULT)."\n";
			$date = new \DateTime($petition_info['birthday']);
			$petition_info['birthday'] = $date->format('Y-m-d H:i:s');
			unset($petition_info['confirm_password']);
			unset($petition_info['session_confirm']);

			$userModel =  new \App\Models\UserModel();
			$petition_info['renewalkey'] = $this->generateRandomString();
			
			$petition_info = $userModel->addUser($petition_info);
			if ($petition_info['id'] != 0) {
				unset($petition_info['password']);
				$url_set = base_url().'/user/confirm?key='.$petition_info['renewalkey'] . "&mail=" . $petition_info['email'];
				$emailmsg = 'Hola! '.$petition_info['username'].'. Gracias por registrarte, en el siguiente <a href="'.$url_set.'">enlace</a> podrá activar de forma automática a su cuenta, en caso de no poder acceder al enlace copie y pegue lo siguiente: '.$url_set . ' Si aún presenta problemas conteste éste correo para activarlo de forma manual';
				$this->sendmail($petition_info['email'],'Activación de su cuenta', $emailmsg);
				// $this->session->set('user',	$petition_info);
				$this->session->setFlashdata('message',["message"=>"Éxito al registrar, revise su correo para continuar " . $petition_info['username'], 'type' => "success", "icon" => "fas fa-check"]);
				return redirect()->to(base_url());
			}
			else
			{
				$this->session->setFlashdata('message',["message"=>"Error de servidor al registrar", 'type' => "danger", "icon" => "fas fa-exclamation-triangle"]);
				return redirect()->to(base_url());
			}
			// var_dump($petition_info);
		}
		else
		echo "Error petición no válida";
		$this->session->remove('session_confirm');
	}
	
	public function confirm () {
		$key = $this->request->getGet('key', FILTER_SANITIZE_SPECIAL_CHARS);
		$mail = $this->request->getGet('mail', FILTER_SANITIZE_SPECIAL_CHARS);
		if (empty($key) || empty($mail)) {
			$this->session->setFlashdata('message',["message"=> "Datos incorrectos", 'type' => "danger", "icon" => "fas fas fa-exclamation-triangle"]);
			return redirect()->to(base_url());
		}
		$activacion = $this->userModel->activeUser($mail,$key);
		if ($activacion['message'] == "Success"){
					$this->session->setFlashdata('message',["message"=>"Éxito al activar su cuenta!!" . $petition_info['username'], 'type' => "success", "icon" => "fas fa-check"]);
					$this->session->set('user', $activacion['user']);
				}
		else
			$this->session->setFlashdata('message',["message"=> $activacion['message'], 'type' => "danger", "icon" => "fas fas fa-exclamation-triangle"]);
		
		return redirect()->to(base_url());
	}

	public function update($id) {
		$petition_info = $this->request->getPost(null, FILTER_SANITIZE_SPECIAL_CHARS);
		if ($petition_info['password'] != $petition_info['confirm_password']) {
			$this->session->setFlashdata('message',["message"=> "Las contraseñas no coinciden", 'type' => "danger", "icon" => "fas fas fa-exclamation-triangle"]);
			return redirect()->to(base_url() . "/user?id=" . $id);
		}
		unset($petition_info['confirm_password']);
		$this->userModel->updateUser($petition_info,$id);
		
		$this->session->setFlashdata('message',["message"=> "Éxito al actualizar", 'type' => "success", "icon" => "fas fas fa-check"]);
		return redirect()->to(base_url() . "/user?id=" . $id);
	}

	

	

	
	

	//--------------------------------------------------------------------

}
