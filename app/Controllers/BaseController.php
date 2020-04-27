<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}
	/**
	 *@var principal_view 		String | String Array -> la, o las vistas principales
	 *@var other_headers		String | String Array -> Headers especiales, sobreescriben a los actuales
	 *@var other_footers		String | String Array -> Footers especiales, sobreescriben a los actuales
	 *@var data	Array -> los datos a pasar a cada vista con el formato nombre_vista => data
	*/
	public function render ($principal_view, $data = [], $other_headers = "", $other_footers = "" ) {
		if (gettype($other_headers)== "string" && $other_headers != "") {
			if (array_key_exists($other_headers, $data))
				echo view($other_headers,$data[$other_headers]);
			else
				echo view($other_headers);
		}
		elseif (gettype($other_headers) == "array") {
			foreach ($other_headers as $value) {
				if (array_key_exists($value, $data))
					echo view($value, $data[$value]);
				else
					echo view($value);
			}
		}
		else {
			if (array_key_exists('header', $data))
				echo view('renders/header', $data['header']);
			else
				echo view('renders/header');
		}
		if (gettype($principal_view)== "string" && $principal_view != "") {
			if (array_key_exists($principal_view, $data))
				echo view($principal_view,$data[$principal_view]);
			else
				echo view($principal_view);
		}
		elseif (gettype($principal_view) == "array") {
			foreach ($principal_view as $value) {
				if (array_key_exists($value, $data))
					echo view($value, $data[$value]);
				else
					echo view($value);
			}
		}
		if (gettype($other_footers)== "string" && $other_footers != "") {
			if (array_key_exists($other_footers, $data))
				echo view($other_footers,$data[$other_footers]);
			else
				echo view($other_footers);
		}
		elseif (gettype($other_footers) == "array") {
			foreach ($other_footers as $value) {
				if (array_key_exists($value, $data))
					echo view($value, $data[$value]);
				else
					echo view($value);
			}
		}
		else {
			if (array_key_exists('footer', $data))
				echo view('renders/footer', $data['footer']);
			else
				echo view('renders/footer');
		}
	}
	public function getTags(){
		
	}

}
