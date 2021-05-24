<?php
include('db/koneksi.php');
session_start();
?>
<html>
<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>About</title>
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  background-color: #483D8B
}

.konten {
  margin-top: 40px; 
  margin-left: 65px; 
  margin-right: 65px;
  margin-bottom: 60px;
  background: #C0C0C0;
  padding-right: 100px;
  padding-left: 100px;
  padding-bottom: 45px;
  border-radius: 7px;
}
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  border-radius: 10px;
  color: black;
}
/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 100%;
  padding: 0px 10px;
  height: 350px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}

.button {
  color: black;
  padding: 40px;
  text-align: left;
  display: inline-block;
  font-size: 18px;
  margin: 25px 2px;
  cursor: pointer;
  background-color: #778899;
  width: 100%;
}

/* Style the footer */
.footer {
  background-color: #D3D3D3;
  height: 37px;
  text-align: center;
}
.src{
  float: right;
  margin: 10px 0px 10px 10px;
  height: 27px;
  width: 20%;
  border-radius: 7px;
  padding: 5px;
}
.isrc{
  float: right;
  margin: 9px 25px 9px 5px;
  height: 30px;
  border:none;
  color: white;
  font-size: 21px;
  background-color: #333;
}
.ibookmark{
  margin: 1px 5px;
  border:none;
  color: white;
  font-size: 17px;
  background-color: #333;
  border-radius: 50%;
}
.iuser{
  margin: 1px 5px;
  border:none;
  color: white;
  font-size: 17px;
  background-color: #333;
  border-radius: 50%;
}
.iout{
  margin: 1px 5px;
  border:none;
  color: white;
  font-size: 17px;
  background-color: #333;
  border-radius: 50%;
}
.ihome{
  margin: 1px 5px;
  border:none;
  color: white;
  font-size: 17px;
  background-color: #333;
  border-radius: 50%;
}
</style>

</head>
<body>
<div class="topnav">
<?php
  if (isset($_SESSION['user'])){
    echo "<a href='LOGOUT.php'><span class='iout'><i class='fad fa-sign-out-alt'></i></span>Logout</a>
          <a href='BOOKMARK.php' style='margin-right: 50px'><span class='ibookmark'><i class='far fa-bookmark'></i></span>Bookmark</a>";
  }
  else{
    echo "<a href='LOGIN.php' style='margin-right: 50px'><span class='iuser'><i class='fas fa-user'></i></span>Login</a>";
  }
?>
  <a href="HOME.php"><span class='ihome'><i class="fas fa-home-lg"></i></span>Home</a>
  <a href="NEW NOVELS.php">New Novels</a>
  <a href="GENRE.php">Genre</a>
  <a href="COMPLETED.php">Completed</a>
  <a href="AllNovel.php">All Novel</a>
  <a href="ABOUT.php">About</a>
  <form method="GET" action="AllNovel.php">
    <button class="isrc" type="submit" name="cari" style="width: 30px;"><i class="fas fa-search"></i></button>
    <input class="src" type="text" name="keyword" placeholder="Search...">
  </form>
</div>
<div class="konten">
  <br>
  <h1>About</h1>
  <hr>
<div class="row">
  <div class="column">
    <p class="button" style="border-radius:7px; margin-bottom: 15px;"><b>TBNovel adalah situs untuk membaca novel online secara gratis.<br><br>
    Alasan dibuat situs ini adalah untuk memenuhi tugas besar dari mata kuliah Pemograman Web.<br><br>
    Disusun Oleh :<br>
    -Gusti Muhammad Kamalullah<br>
    -Marifah Candrani Mustika<br>
    -Luthfy Adhiya<br>
    <br>
    Jika Anda memiliki pertanyaan atau saran untuk kami, Anda dapat menghubungi kami atau mengirim email kepada kami di contact@tbnovel.com
    </b></p>
  </div>

</div>
</div>

<div class="footer">
  <p style="padding: 10px;">&copy; 2021 - Tugas Besar</p>
</div>
</body>
</html>