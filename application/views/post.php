<!DOCTYPE html>
<html>

<head>

	<title>

	</title>
	<style>
		* {
			margin: 0px;
			padding: 0px
		}

		body {
			background: #e3e3e3;
		}
		header{
			
			background: #078;
			color: #fff;
			height: 50px;
			width: 100%;
			z-index: 100;
			
		}
		header h3{
			float: left;
			width: 8%;
			margin-left: 2%;
			padding-top: 1%;
			font-family: tahoma;
	
		} header h3 a{
			
					text-decoration: none;
		    text-decoration-color: #fff;
    text-decoration: none;
    color: #fff;
		}
		.blog{
    margin-top: 43px;
    background: #fff;
    width: 60%;
    color: black;
    border-left: 2px solid #078;
    margin-left: 2%;
			padding-bottom: 30px;
			float: left;
}
		.title{
			
			
    font-size: 25px;
    color: #079;
    font-weight: bold;
    font-family: tahoma;
    margin-left: 18px;
    border-bottom: 1px solid #078;
    width: 91%;
    padding: 2px;

		}
		.date{
			
			
    margin-left: 18px;
    font-size: 17px;
    border-left: 1px solid;

		}
		.img{
			
			
    margin-left: 19px;
    padding-left: 5px;
    padding-top: 11px;

		}	
		.cont{
    margin-left: 5%;
    font-family: tahoma;
    font-size: 18px;
    padding: 1%;
}
	</style>
</head>

<body>
	<header>
		<h3> <a href="http://localhost/blog/index.php/home/">Home </a> </h3>
		<h3>About</h3>
		<h3>
		<?php 
			 if(isset($_SESSION['login'])){
				 echo'<a href="http://localhost/blog/index.php/admin/logout">logout</a>
 ';?> &nbsp;&nbsp;
			 <?php
				 echo'<a href="http://localhost/blog/index.php/admin/">CP</a>
 ';
			 }else{
							echo '<a href="http://localhost/blog/index.php/home/login">Login </a>';	 
 
			 }
			
			?>
		</h3>
		<h3></h3>
		<h3></h3>
		
	</header>
	<div style="clear:both"></div>
	<?php 
	foreach($post as $blog){
	
	?>
	 <div class="blog">
		<div class="title"><?php echo $blog->title; ?></div>
		<div class="date"><?php echo $blog->date; ?></div>
		<div class="img"><img src="<?php echo base_url(); ?>/blog/uploads/<?php echo $blog->img; ?>" width="80%" height="200px" style="
    border-radius: 4px;
    width: 94%;
"></div>
		<div class="cont"><?php echo $blog->atr; ?> </div>
	
	</div>
   
   <?php }?>
	   </body>

</html>