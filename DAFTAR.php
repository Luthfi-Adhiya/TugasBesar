<html>
<head>
    <title>Daftar</title>
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
	<center><h2>Daftar</h2><br></center>
  <div class="form-input">
	<form method = "post">
        <span>Nama Lengkap</span>
			<input type="text" name="nama" required placeholder = " Nama..."><br>

        <span>E-mail</span>
			<input type="email" name="email" required placeholder = " Email..."><br>	

		<span>Username</span>
			<input type="text" name="user" required placeholder = " Username..."><br>	
	
        <span>Password</span>
			<input type="password" name="pass" required placeholder = " Password..."><br>
        
		<input type="submit" value="Daftar" name="daftar" class="btn">
		<input type="reset" value="Reset" class="btn"><br><br>
        <a href='LOGIN.php'>Kembali</a>
	</form>
  </div>
</div>
</body>
</html>
<?php
    include('db/koneksi.php');
	
    if (isset($_POST['daftar'])) {
        $nama = $_POST['nama'];
        $email= $_POST['email'];
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $tambah = mysqli_query($koneksi,"INSERT INTO tb_login VALUES('$user','$pass','$nama','$email')");
        if ($tambah) {
            echo "<script>
                alert('Berhasil Daftar');
                window.location='LOGIN.php';
            </script>";
        }else {
            echo "<script>
                alert('Gagal Daftar');
                window.location='DAFTAR.php';
            </script>";
        }
    }
?>