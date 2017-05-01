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

		header {

			background: #078;
			color: #fff;
			height: 50px;
			width: 100%;
			z-index: 100;
		}

		header h3 {
			float: left;
			width: 8%;
			margin-left: 2%;
			padding-top: 1%;
			font-family: tahoma;
		}

		header h3 a {

			text-decoration: none;
			text-decoration-color: #fff;
			text-decoration: none;
			color: #fff;
		}

		.blog {
			margin-top: 43px;
			background: #fff;
			width: 40%;
			color: black;
			border-left: 2px solid #078;
			margin-left: 2%;
			padding-bottom: 30px;
			float: left;
		}

		.title {


			font-size: 25px;
			color: #079;
			font-weight: bold;
			font-family: tahoma;
			margin-left: 18px;
			border-bottom: 1px solid #078;
			width: 91%;
			padding: 2px;
		}

		.date {


			margin-left: 18px;
			font-size: 17px;
			border-left: 1px solid;
		}

		.img {


			margin-left: 19px;
			padding-left: 5px;
			padding-top: 11px;
		}

		.cont {
			margin-left: 5%;
			font-family: tahoma;
			font-size: 18px;
			padding: 1%;
		}
	</style>
	<script src="<?php  echo base_url();?>/blog/sharefile/tinymce/js/tinymce/tinymce.min.js"></script>
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>


</script>
	<header>
		<h3> <a href="http://localhost/blog/index.php/home/" class="tab" >Home </a> </h3>
		<h3><a href="http://localhost/blog/index.php/admin/adduser" class='tab'>Adduser </a></h3>
		<h3><a href="http://localhost/blog/index.php/admin/addpost" class='tab'>add post </a></h3>
		<h3><a href="http://localhost/blog/index.php/admin/setup" class='tab'>setup</a></h3>

		<h3><a href="http://localhost/blog/index.php/admin/logout" class='tab'>logout</a></h3>
		<h3></h3>
		<h3></h3>

		</head>
	</body>
</html>
