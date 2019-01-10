<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('google_model');
	}
	public function index()
	{
		$result = $this->google_model->Count_Data();
        $data['count']=$result;
		$this->load->view('google_maps',$data);
	}
	public function cluster_Data(){
		$latlng=$this->google_model->latlng();
		echo json_encode($latlng);
	}
	public function searched_Data(){
		$user_id=$this->_randomNumber(4);
		$address=$this->input->post('address');
		$latitude=$this->input->post('latitude');
		$longitude=$this->input->post('longitude');
		$city=$this->input->post('addressArr');
		$data=array(
			'user_id'=>$user_id,
			'latitude'=>$latitude,
			'longitude'=>$longitude,
			'address'=>$address,
			'city'=>$city[0],
			'country'=>$city[1]
		);
		$this->google_model->insertData('mapspoints',$data);
		$result=$this->google_model->Count_Data();
		echo json_encode($result);
	}
	private function _randomNumber($length = 4) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomNumber = '';
        for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomNumber;
    }
}
