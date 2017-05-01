
<?php

foreach ($userprev as $value) {
  $can_save= $value->can_save;
  $can_delete= $value->can_delete;

  $is_admin= $value->can_update;

  $can_accsess= $value->can_accsess;
$username=$value->usename;

  # code...
}
if( $username!='sa' && $can_accsess==-1 || $is_admin==-1 ){
echo "no accses";die;


}
?>
<style>/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}
label{
color:black;

}
/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	min-height: 200px;
	/* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
	color: black;
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}
</style>
<br>
<br>
<br>
<br>
<?php
$this->load->library('cart');


 $this->load->helper(array('form'));?>
 <div class="container">
 <img src="http://4.bp.blogspot.com/-ZgHemtWMGcg/VAK5lKSU0xI/AAAAAAAAPZ0/JrFNRMYY6Ds/s1600/tutorial-4-search.png" width='80px' height='40px'  id="myBtn">

<?php
 echo form_open('blog/index.php/admin/adduser');
	 		$query="select * from users";
		$ok= $this->db->query($query)->num_rows();
	 ?>


    <label for="fname">id</label>
    <input type="text" id="id" name="id" placeholder="id" readonly value="<?php echo ++$ok; ?>">
     <label for="fname">First Name</label>
    <input type="text" id="fname" name="username" placeholder="Your username.." >

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="password" placeholder="Your password.." >
   <?php

$data['id']=1;
  $this->load->view('drow_select',$data);
 ?>
 <?php

$data['id']=2;
$this->load->view('drow_select',$data);
?>


<?php if($username=='sa'   ||  $is_admin==1){ ?>
    <label for="save">save</label>
    <input type="checkbox" id="save" name="saves" placeholder="Your password.." value='0' onclick="$(this).attr('value', this.checked ? 1 : 0)"
>

    <label for="del">delete</label>
    <input type="checkbox" id="del" name="del" placeholder="Your password.."  value='0'  onclick="$(this).attr('value', this.checked ? 1 :0)">
    <label for="save">is admin</label>
    <input type="checkbox" id="update" name="updates" placeholder="Your password.."  value='0'  onclick="$(this).attr('value', this.checked ? 1 : 0)">

    <label for="accsess">accsess</label>
    <input type="checkbox" id="acc" name="acc" placeholder="Your password.."   value='0' onclick="$(this).attr('value', this.checked ? 1 : 0)">

<?php } ?>


   <input type="hidden" id="updatess" name="update" value="0">
     <input type="submit" value="Submit" name="save" <?php if( $username!='sa' && $can_save==-1)echo "disabled"; ?>>
<input type='Hidden' value='"<?php
$path= FCPATH.$this->router->class;

$path=$path.'/'.$this->router->fetch_method();
echo $path;
?>"' name="path" id='path'>
  </form>
</div>

</div>

<!--search user to edit modal box-->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>

    <p>
   <h3 style="color:black;width:100%"> search user here ...</h3>
    	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable">
   	  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">...</th>
  </tr><tr>

    	<?php 		$query="select * from users";
		$query=mssql_query($query);
	    while($fetch=mssql_fetch_assoc($query)){
echo'<tr><td>';
 echo $fetch['usename'];
 echo '</td>';


echo '<td><button style="
    background: #078;
    border: none;
    color: #fff;
    padding: 7px;
    width: 63px;
    border-radius: 4px;
"
onclick="update(this.value)" value="'.$fetch['id'].'|'.$fetch['usename'].'?'.$fetch['password'].'} '.$fetch['can_save'].' @'.$fetch['can_delete'].'^'.$fetch['can_update'].' &'.$fetch['can_accsess'].'  ~  ">Edit<button>


</td></tr>';



	    }
	    ?>
	</tr>
    </table>
    </p>
  </div>

</div>
<script>
function update(x){
var uid=(x.substring(0, x.indexOf('|')));
	//alert(id);
document.getElementById("id").value = uid	;
	var i=uid.length+1;
	//alert(i);
var username=(x.substring(i, x.indexOf('?')));
	//alert(username);
	document.getElementById("fname").value = username	;
	var j=username.length+4;
	//alert(i);
  var password=x.substring(x.lastIndexOf("?")+1,x.lastIndexOf("}"));


	document.getElementById("lname").value = password	;

//save value
var save=x.substring(x.lastIndexOf("}")+1,x.lastIndexOf("@"));


document.getElementById("save").value = save	;
var save=$('#save').val();
if(save==1){
  $('#save').attr('checked','true');
}else{
  $('#save').removeAttr('checked');

}
//delete
var del=x.substring(x.lastIndexOf("@")+1,x.lastIndexOf("^"));


document.getElementById("del").value = del	;
var del=$('#del').val();
if(del==1){
  $('#del').attr('checked','true');
}else{
  $('#del').removeAttr('checked');

}
//updatess
var update=x.substring(x.lastIndexOf("^")+1,x.lastIndexOf("&"));


document.getElementById("update").value = update	;
var del=$('#update').val();
if(del==1){
  $('#update').attr('checked','true');
}else{
  $('#update').removeAttr('checked');

}


//accsses
var acc=x.substring(x.lastIndexOf("&")+1,x.lastIndexOf("~"));


document.getElementById("acc").value = acc	;
var del=$('#acc').val();
if(del==1){
  $('#acc').attr('checked','true');
}else{
  $('#acc').removeAttr('checked');

}




	document.getElementById("updatess").value = 1	;

//lert(username);

//document.getElementById("id").value = x	;
    modal.style.display = "none";


}
</script>



<script>var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

}
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


$("input").dblclick(function(){
  var paths=$('#path').val();
   var path= "http://localhost/blog/index.php/admin/mind/"+$(this).attr('name')+'/'+'adduser';
  $.ajax( {
            url : path,
            type : "GET",
            success : function(data) {

                }
            });
            $(this).prev().css('color','red');
              $(this).attr('requerd','true');
              $(this).css('border','1px solid red');

   });
</script><?php


;

?>
