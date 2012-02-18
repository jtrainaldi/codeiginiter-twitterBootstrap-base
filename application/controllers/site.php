<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	/**
	 * CONTROLLER INTRODUCTION/HELP
	 *
	 * This controller is the main website controller.  
	 *  - The functions below are controlled by custom routes (config/routes.php)
	 *
	 */


	/**
	 * Website Home page.
	 * Desc: Display the home page
	 *
	 */
	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('templates/fluid', $data);
	}

	/**
	 * Website Home page.
	 * Desc: Display the home page
	 *
	 */
	public function home()
	{
		$data['content'] = 'home';
		$this->load->view('templates/fluid', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */