<?php
include('db/koneksi.php');
session_start();
?>
<html>
<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>Bookmark</title>
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
/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 16%;
  height: 300px;
  padding: 10px;
}
.column_n{
  float: left;
  width: 33%;
  height: 300px;
  padding-left: 23px;
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
img {
  display: block;
}
/* Style the footer */
.footer {
  background-color: #D3D3D3;
  height: 37px;
  text-align: center;
}
.link {
  color: black;
  text-decoration: none;
}
th,td{
  padding: 4px;
  vertical-align: top;
} 
h3{
  box-shadow: 1.5px 3px 2px 2px grey;
  border-radius: 5px;
  padding: 2px;
  background-color: #ddd;
  width: 75%;
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
  <h1>My Bookmark</h1>
  <hr>
<div class="row">
  <?php
    $user = $_SESSION['user'];

    if (isset($_GET['cari'])){
      $key = $_GET['keyword'];
      $cari = "SELECT * FROM tb_novels where judul_novel LIKE '%$key%'" ;
    }else{
      $cari = "SELECT tb_bookmark.*, tb_novels.*, tb_login.* FROM tb_bookmark,tb_novels,tb_login WHERE tb_bookmark.username = '$user' AND tb_bookmark.id_novel=tb_novels.id_novel AND tb_bookmark.username=tb_login.username";
    }

    $tampil = mysqli_query($koneksi, $cari);
    while ($data = mysqli_fetch_assoc($tampil)){
      ?>
      <div class="column">
      <?php echo "<a class='link'  href='NOVEL.php?id_novel=".$data['id_novel']."'>"; ?>
  	    <img src="foto/<?php echo $data['gambar_novel']; ?>" alt="" class="gambar" style="border-radius: 7px; box-shadow: 6px 6px 4px black; width: 160px; height: 190px"></a>
      </div>
      <div class="column_n" >
        <?php echo "<a class='link'  href='NOVEL.php?id_novel=".$data['id_novel']."'>"; ?>
        <h3><?php echo $data['judul_novel']; ?></h3></a>
        <br>
        <table>
          <tr>
            <th>Status</th>
            <th>:</th>
            <td><?php echo $data['status_novel']; ?></td>
          </tr>
          <tr>
            <th>Genre</th>
            <th>:</th>
            <td><?php echo $data['genre_novel']; ?></td>
          </tr>
          <tr>
            <td style='padding-top: 17px;'><?php echo "<a href='Delete Bookmark.php?id_novel=".$data['id_novel']."'>Delete</a>";?></td>
          </tr>
        </table>
      </div>
    <?php 
    } ?>
</div>
</div>

<div class="footer">
  <p style="padding: 10px;">&copy; 2021 - Tugas Besar</p>
</div>
</body>
</html>