<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{	
		if(!$this->session->userdata('gold')){
			$this->session->set_userdata('gold', 0);
		}
		if(!$this->session->userdata('activities')){
			$this->session->set_userdata('activities', array());
		}
		$this->load->view('index');
	}
	public function process_money(){
		$building = $this->input->post('building');
		if($building ==='farm'){
			redirect(base_url() . 'main/farm');
		}else if($building ==='cave'){
			redirect(base_url() . 'main/cave');
		}else if($building ==='house'){
			redirect(base_url() . 'main/house');
		}else if($building ==='casino'){
			redirect(base_url() . 'main/casino');
		}else{
			redirect(base_url() . 'main/reset');
		}
	}
	public function farm(){
		$earned_gold = rand(10,15); 

		date_default_timezone_set('America/Los_Angeles'); // for date/time zone

		$activities = $this->session->userdata('activities');
		$activities[] = "<p class='plus'>Earned ".$earned_gold. " golds from the farm! ".date("Y/m/d g:i a");
		$this->session->set_userdata('gold', $this->session->userdata('gold') + $earned_gold);	
		$this->session->set_userdata('activities', $activities);

		redirect(base_url());
	}
	public function cave(){
		$earned_gold = rand(5,10);

		date_default_timezone_set('America/Los_Angeles');	
		$activities = $this->session->userdata('activities');
		$activities[] = "<p class='plus'>Earned ".$earned_gold. " golds from the cave! (".date("Y/m/d g:i a") .")";
		$this->session->set_userdata('gold', $this->session->userdata('gold') + $earned_gold);
		$this->session->set_userdata('activities', $activities);

		redirect(base_url());
	}
	public function house(){
		$earned_gold = rand(2,5);

		date_default_timezone_set('America/Los_Angeles');	
		$activities = $this->session->userdata('activities');
		$activities[] = "<p class='plus'>Earned ".$earned_gold. " golds from the house! (".date("Y/m/d g:i a") .")";
		$this->session->set_userdata('gold', $this->session->userdata('gold') + $earned_gold);
		$this->session->set_userdata('activities', $activities);

		redirect(base_url());
	}
	public function casino(){
		$earned_gold = rand(2,5);
		$earn_lose = rand(0,1); // 0 = loose, 1 = win

		date_default_timezone_set('America/Los_Angeles');	
		$activities = $this->session->userdata('activities');

		if($earn_lose == '0'){ 			
			$activities[] = "<p class='minus'>Entered a casino and lost ".$earned_gold. " golds ... Ouch.. (".date("Y/m/d g:i a") .")";
			$earned_gold = $earned_gold * -1;
		}else{
			$activities[] = "<p class='plus'>Earned ".$earned_gold. " golds from the casino! (".date("Y/m/d g:i a") .")";
		}
		
		$this->session->set_userdata('gold', $this->session->userdata('gold') + $earned_gold);
		$this->session->set_userdata('activities', $activities);

		redirect(base_url());
	}
	public function reset(){
		$this->session->unset_userdata('gold');
		$this->session->unset_userdata('activities');
		redirect(base_url());
	}
}

//end of main controller