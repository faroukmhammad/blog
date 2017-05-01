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
</head>

<body>
	<header>
		<h3> <a href="http://localhost/blog/index.php/home/">Home </a> </h3>
		<h3>About</h3>
		<h3>Login</h3>
		<h3></h3>
		<h3></h3>

		</head>
		<div style="clear:both"></div>
		<div style="width: 40%; background: #fff; color: black; font-family: tahoma; margin-left: 28%; margin-top: 6%; position: fixed; padding: 2%;height:200px;">
			<h1 style=" padding: 0px; background: #078; width: 118%; margin-left: -9%; margin-top: -6%; height: 47px; padding: 2px; text-align: center; color: #fff; ">login Form</h1>
		<?php echo form_open('blog/index.php/home/checklogin'); ?>

		<label for="username">Username:</label>
		<input type="text" size="20" id="username" name="username"  style=" width: 80%; height: 36px; border-color: #079; border-radius: 4px; margin-top: 14px; "/>
		<br/>
		<label for="password">Password:</label>
		<input type="password" size="20" id="passowrd" name="password" style=" width: 80%; height: 36px; border-color: #079; border-radius: 4px; margin-top: 14px; " />
		<br/>
		<input type="submit" value="Login" style=" margin-left: 14%; width: 81%; height: 40px; background: #079; border: none; border-radius: 6px; margin-top: 19px; color: #fff; font-size: 21px; " />
		<?php echo form_close(); ?>
			
			
		</div>
</body>

</html>