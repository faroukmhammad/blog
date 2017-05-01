<?php
class Home extends CI_Controller{


	public function index(){
		$this->load->model('Home_blog');
		$data=$this->Home_blog->getblog();

			$this->load->view('home',$data);


	}

	function view_blog($post){

		$this->load->model('Home_blog');
		$data=$this->Home_blog->oneblog($post);
		$this->load->view('post',$data);

		//echo "select * from blog where title='".$post."";

	}
 public function login(){
	 $this->load->helper(array('form'));
	 $this->load->view('login');
 }

	public function checklogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');

		$username=$this->input->post('username',true);
		$password=$this->input->post('password',true);
		if($username=='' or $password==''){
			echo '
			<script>
	alert("username  or password is empty");
</script>';  $this->load->helper(array('form'));
			$this->load->view('login');
		}
		else{
			$query=$this->db->from('users');

		  $query=  $this->db->where('usename', $username);
			$query=  $this->db->where('password', $password);

			$query = $this->db->get();
		//	var_dump( $this->db );
			//$query="select * from users where usename='".$username."' AND password='".$password."'";
	    $ok=$query->num_rows();
		if($ok>=1){
		$_SESSION['login']='1';
		$_SESSION['username']=$username;

// login done

			header('location:http://localhost/blog/index.php/admin');

			 }else{ $this->load->helper(array('form'));  echo '
<script>
	alert("username and password not true");
</script>';  $this->load->helper(array('form'));
			      $this->load->view('login');

			      }


		} }
		function webservice(){

$x=($_GET['uid']);
$data=$this->db->query('select * from users where id='.$x.'  ')->result();
echo json_encode($data);

		}


		public function export_csv() {

	 $file_name = 'File_name_'.date("Y-m-d h-i-s").'.csv';
	 $query = $this->db->query("SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE'

");

	 $this->load->dbutil();
	 $data = $this->dbutil->csv_from_result($query);
	 $this->load->helper('download');
	 force_download($file_name, $data);
}

}



?>
