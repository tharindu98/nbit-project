<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BankController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bank');
	}


	public function index()
	{
		$data['banks_list'] = $this->Bank->banks_list();
		$data['branch_list'] = $this->Bank->getBranchesList();
		$this->load->view('index', $data);
	}

	public function branches()
	{
		$data['banks_list'] = $this->Bank->banks_list();
		$data['branch_list'] = $this->Bank->getBranchesList();
		$this->load->view('branch-manager', $data);
	}
	public function add_branches()
	{
	//	var_dump($_POST);
	//	exit;
		$bank_id = $this->input->post('bank');
		$branch_name = $this->input->post('name');
		$branch_code = $this->input->post('code');
		$action = $this->input->post('action');


		$savedata = array(
			'bank_id' => $bank_id,
			'branch_name' => $branch_name,
			'branch_code' => $branch_code
		);
		if ($action == 'edit') {
			$update_id = $this->input->post('update_id');
			$this->Bank->update_branches($savedata, $update_id);
		} else {

			$saved_status = $this->Bank->save_branches($savedata);
			$data['saved_status'] = $saved_status;

		}



		$data['branch_list'] = $this->Bank->getBranchesList();
		//	var_dump($data['message']);exit;
		$this->load->view('branch-manager', $data);
	}
	public function edit_branches()
	{
		//	var_dump($_POST);exit;
		$id = $this->input->post('user_id');
		$data = $this->Bank->getBranchDataById($id);
		echo json_encode($data);
		exit;
	}
}
