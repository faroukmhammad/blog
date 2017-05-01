<?php
class Admin extends CI_Controller
  {
    function __constant()
      {
}
    function index()
      {
        //$this->load->helper('cookie');

        if (isset($_SESSION['login']))
          {
            $this->load->view('header');






          }
        else
          {
            redirect('http://localhost/blog/index.php/home/login');

          }
      }
    


    function adduser()
      {

        if(isset($_SESSION['username'])){
        $getuserdata=$_SESSION['username'];
        $data['userprev']=$this->db->query('select * from users where usename="'.$getuserdata.'" ')->result();


        }

        $this->load->view('header',$data);
        $this->load->view('adduser');
        $this->load->view('footer');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $update   = $this->input->post('update');


        if (isset($_POST['id']))
            $id = $_POST['id'];
        //print_r ($_POST);
        if (isset($_POST['save']))
          {

if(($this->input->post('saves'))==!null){ $saves=1;}else{
  $saves=-1;
}
if(($this->input->post('del'))==!null){ $del=1;}else{
  $del=-1;
}

if(($this->input->post('updates'))==!null){ $updates=1;}else{
  $updates=-1;
}

if(($this->input->post('acc'))==!null){ $acc=1;}else{
  $acc=-1;
}


            if ($update == 0)
              {
                $query = "insert into  users values ('" . $username . "' ,'" . $password . "',
                         ".$saves.",
                         ".$del.",
                         ".$update.",
                         ".$acc."

                )";
              }
            else
              {

                $query = "
			update users set
			usename='" . $username . "',
			password='" . $password . "',
      can_save=".$saves.",
      can_delete=".$del.",
      can_update=".$updates.",
      can_accsess=".$acc."

			where id='" . $id . "'
				";
              }
            $this->db->query($query);
            print "<script type=\"text/javascript\">alert('user added');</script>";

            redirect('http://localhost/blog/index.php/admin/adduser');

          }




      }

    function addpost()
      {



        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->view('header');
        $this->load->view('addpost');
        if (isset($_POST['title']))
            $title = $_POST['title'];
        if (isset($_POST['cont']))
            $cont = $_POST['cont'];
        if (isset($_FILES['img']))
            $img = $_FILES['img']['name'];
        if (isset($_POST['date']))
            $date = $_POST['date'];
        if (isset($_POST['id']))
            $id = $_POST['id'];
        //print_r ($_POST);
        if (isset($_POST['save']))
          {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 5000;
            $config['max_width']     = 4000;
            $config['max_height']    = 4000;
            $this->load->library('upload', $config);
            $this->upload->do_upload('img');
            $query = "insert into  blog values ('" . $title . "' ,'" . $cont . "' ,'" . $date . "','" . $img . "')";
            $this->db->query($query);
            print "<script type=\"text/javascript\">alert('post added');</script>";
            redirect('http://localhost/blog/index.php/admin/addpost');


          }
      }

   public function mind($mind,$path)
     {

       $data = array(
'id' => 1,
'username' => $mind,
'password'=>$path
                          );
          $this->db->insert('user',$data);

     }

     public function removepost($id){
       $this->db->where('ID', $id);
       $this->db->delete('blog');
     }
     public function setup()
     {

               $this->load->helper(array(
                   'form',
                   'url'
               ));
               $this->load->view('header');
     $this->load->view('setup');

     $save=$this->input->post('ok');
//echo $name_ar=$this->input->post('name_ar');
;
     if($save==1){
$name_ar=$this->input->post('name_ar');
$name_en=$this->input->post('name_en');
$setup=$this->input->post('setup');
       $this->db->query('insert into setups values(
        "'.$setup.'",
        "'.$name_ar.'",
        "'.$name_en.'"

     ) ');
     echo "<script>alert('setup has been added');</script>";

     }

     }


     public function drow_select($id){

       $this->db->query('select * from setups where id=
      [$id]
       ');
     }

    function logout()
      {
        unset($_SESSION['login']);
        redirect('http://localhost/blog/index.php/home/login/');
      }


  }

?>
