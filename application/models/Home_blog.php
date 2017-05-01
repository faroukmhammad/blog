<?php
Class Home_blog extends CI_Model{

	function index(){
		$data['homeart']=$this->db->query('
		select * from blog order by date desc
		')->result();
		return $data;

	}


	function getblog(){
		$data['homeart']=$this->db->query('
		select * from blog order by date desc
		')->result();
		return $data;

	}
	public function oneblog($post){

		$query="select * from blog where ID like '".$post."' ";
		//echo $query;
         $data['post']=$this->db->query($query)->result();
		return $data;
	}

}

?>
