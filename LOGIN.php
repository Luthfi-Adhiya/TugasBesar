<?php
session_start();
include('db/koneksi.php');
	if (isset($_SESSION['user'])){
		header('location:HOME.php');
	}	
?>
<html>
<head>
    <title>Login</title>
    <style>
        .konten{
            width: 30%;
	        margin: 0 auto;
            margin-top: 85px;
            border-radius: 7px;
            background-color: #82E0AA;
            padding:10px;
            border: 2px solid black;
            box-shadow: -5px 5px 7px 3px black;
        }
        input{
            margin: 10px 0;
            width: 100%;
            height: 35px;
            border: 2.5px solid grey;
            border-radius: 7px;
            font-weight: bold;
        }
        .btn{
            height: 35px;
            width: 100px;
            border: none;
            margin-left:70px;
            border: 2.5px solid grey;
            border-radius: 7px;
            background-color: #5DADE2;
        }
        span{
            padding: 7px;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-color: #ABB2B9;">
<div class="konten">
	<center><h2>Login</h2><br></center>
  <div class="form-input">
	<form method = "post">
		<span>Username :</span>
			<input type="text" name="user" required placeholder = " Username    ..."><br>	
	
        <span>Password :</span>
			<input type="password" name="pass" required placeholder = " Password..."><br>
        
		<input type="submit" value="Login" name="login" class="btn">
		<input type="reset" value="Batal" class="btn"><br><br>
        <a href="DAFTAR.php">Daftar?</a>
        <a href="HOME.php" style="float: right;">Back Home</a>
	</form>
  </div>
</div>
</body>
</html>
<?php
if(isset($_POST['login'])){
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$query = "select * from tb_login where username = '$user' and password = '$pass'";
	$exe = mysqli_query($koneksi,$query);
	if(mysqli_num_rows($exe)>=1){
		$data = mysqli_fetch_array($exe);
		$_SESSION['user']=$data['username'];
		echo "<script>alert('Login Berhasil');
		window.location = 'HOME.php';</script>";

    }
    else{
		echo "<script>alert('Login gagal');
		window.location = 'LOGIN.php';</script>";
	}
}
?>