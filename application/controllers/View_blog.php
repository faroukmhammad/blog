<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_blog extends CI_Controller {

	
public function index(){
		$data['homeart']=$this->db->query('
		select * from blog')->result();
		$this->load->view('home',$data);

	}
  public	function view_blog(){


	}
}
