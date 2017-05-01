

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

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	color: black;
}.modal {
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
</style>
<br>
<br>
<br>
<br>
<script>

tinymce.init({
  selector: 'textarea',

  height: 200,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
 });
</script>
<?php
 $this->load->helper(array('form'));?>
 <div class="container">
	 <img src="http://4.bp.blogspot.com/-ZgHemtWMGcg/VAK5lKSU0xI/AAAAAAAAPZ0/JrFNRMYY6Ds/s1600/tutorial-4-search.png" width='80px' height='40px'  id="myBtn">
<?php
 echo form_open_multipart('blog/index.php/admin/addpost');
	 		$query="select * from blog";
		$ok= $this->db->query($query)->num_rows(); ;
	 ?>


    <label for="fname">id</label>
    <input type="text" id="id" name="id" placeholder="id" readonly value="<?php echo ++$ok; ?>">
     <label for="fname">First Name</label>
    <input type="text" id="fname" name="title" placeholder="post title.." required>

    <label for="lname">img</label>
    <input type="file" id="lname" name="img" placeholder="post img.." required>
  <br> <label for="lname">post date</label>
    <input type="text" id="lname" name="date" placeholder="post img.." required readonly value="<?php echo date('Y-m-d') ?>">

       <label for="lname">post contact</label>

<textarea name="cont" class='tinymce' novalidate></textarea>
    <input type="submit" value="save" name="save">

  </form>
</div>

</div>
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

    	<?php 		$query="select * from blog";
		$query=mssql_query($query);
	    while($fetch=mssql_fetch_assoc($query)){
echo'<tr id="id" style="color:black">'.$fetch['ID'].'<td>';
 echo $fetch['title'];
 echo '</td>';


echo '<td><button style="
    background: red;
    border: none;
    color: #fff;
    padding: 7px;
    width: 63px;
    border-radius: 4px;
"
onclick="remove(this.value)" value="'.$fetch['ID'].'">remove<button>


</td></tr>';



	    }
	    ?>
	</tr>
    </table>
    </p>
  </div>

</div>
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


function remove(x){
	//alert(x);
	var jqxhr = $.ajax( "http://localhost/blog/index.php/admin/removepost/"+x )
	  .done(function() {
	   $(this).remove();
	  })
	  .fail(function() {
	    alert( "error" );
	  });

	// Perform other work here ...

	// Set another completion function for the request above
	jqxhr.always(function() {
	  alert( "second complete" );
	});

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

</script>
