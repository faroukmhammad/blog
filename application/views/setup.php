
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
}
</style>

<br>
<br>
<br>
<br>

<div style="
    color: black;
    width: 32%;
    background: #fff;
    height: 358px;
    margin: 2%;
    font-size: 18px;
    text-shadow: 0px 0px 1px #079;
        justify-content: center;
">
<?php echo form_open('blog/index.php/admin/setup','name="setup"');
 ?>
  <label for="setup"> Add new (select setup type)</label>
<select class="setup" name="setup">
  <option value="-1">select</option>
  <option value="1">country</option>
    <option value="2">poston</option>


</select>
<label for="">name arabic</label>
<input type="text" name='name_ar' >
<label for="">name english</label>
<input type="text" name="name_en" value="">
<input type="hidden" name="ok" value="1">
<input type="button" id="save" value="save" name="save" onclick="saves()" style="
    width: 40%;
    background: #079;
    height: 40px;
    border: 0px;
    color: #fff;
    font-size: 17px;
    margin-left: 29%;
">
</div>
<script>
function saves(){
var check=$('.setup').val();
if(check !=-1){
setup.submit();

}else{
  alert('pleas select setup type');
$('.setup').focus();
$('.setup').css('border','1px solid red');

}

}
</script>
