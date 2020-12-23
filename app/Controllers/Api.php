<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Api_Model;
use CodeIgniter\I18n\Time;

class Api extends BaseController
{
	public function __construct()
	{
		$this->api = new Api_Model();
	}

	public function index() //project list + form create
	{
		$data['client_app'] =  $this->api
									->getApp()
									->getResultArray();
		return view('pages/Api/index', $data);
	}

	//--------------------------------------------------------------------

	public function create() //membuat project baru
	{
		$time = new Time('now');
		$data = array(
			'Uid' => 32,
			'nama_app' => $this->request->getPost('nama_app'),
			'deskripsi' => $this->request->getPost('deskripsi_app'),
			'redirect' => $this->request->getPost('redirect_app'),
			'req_date' =>$time->toDateTimeString(),
			'status' =>'review',
		);
		$this->api->addApp($data);
		return redirect()->to(base_url().'/api');		  
	}

	//--------------------------------------------------------------------
	

	public function update()//update projek * Belum digunakan
	{
		$id =$this->request
				  ->getPost('id_app');
		
		$data = array(

		);

		$this->api->updateApp($data, $id);
		return redirect()->to(base_url().'/api');
	}

	//--------------------------------------------------------------------
	
	public function delete()//delete or cancel  project
	{
		$id = $this->request->getPost('id_app');
		$this->api->deleteApp($id);
		echo json_encode('data sukses dihapus');
	}

	//--------------------------------------------------------------------
	
	public function ajax_edit()//show detail app via ajax
	{
		$id = $this->request->getPost('id');
		$data = $this->api->editApp($id)->getRowArray();
		echo json_encode($data);

	}

	//--------------------------------------------------------------------
	
}
