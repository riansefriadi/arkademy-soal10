<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH</title>
</head>
<body>
	<?php require 'asset/app.php';
		$Lib = new Library(); ?>
	<form action="" method="POST">
		<input type="" name="username" placeholder="username">
		<input type="" name="email" placeholder="email" >
		<input type="" name="password" >
		<input type="submit" name="kirim" value="kirim">
	</form>
	<?php if(isset($_POST['kirim'])){
		$username=strip_tags($_POST['username']);
		$email=strip_tags($_POST['email']);
		$password=strip_tags($_POST['password']);
		$Lib = new Library();
		$add=$Lib->addUser($username,$email,$password);
		if($add=='sukses'){
			echo "<script>alert('sukses add');</script>";
			echo "<script>location='index.php';</script>";
		}
	} ?>
</body>
</html>