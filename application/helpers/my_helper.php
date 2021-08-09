<?php if (!defined("BASEPATH")) exit("No direct script access allowed");


function is_login(){


	$ci = get_instance();
	if (!$ci->session->userdata('username')){
		$ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Please Login First!!!</div>');
		redirect('login');

	}
	else{

		$level = $ci->session->userdata('level');
		$parents = $ci->uri->segment(1);

		if($parents == 'admin' || $parents == 'Admin'){
			$parents = 'Administrator';
		}

		if($level !== ucfirst($parents)){
			$ci->session->set_flashdata('pesan','<div class="alert alert-danger mt-2" role="alert">You Dont Have Access!! <a href="#" type="button" onclick="goBack();" class="float-right">Go Back</a></div>');
			redirect('login/home_403');
		}


	}


}
