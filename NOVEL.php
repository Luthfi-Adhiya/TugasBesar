<?php
include('db/koneksi.php');
session_start();
?>
<html>
<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>Novel</title>
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
    padding-bottom: 70px;
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
  width: 100%;
  height: 320px;
  padding: 10px;
}

.column1 {
  width: 100%;
  padding: 10px;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

img {
  width: 260px;
  height: 290px;
}

.button {
  color: black;
  padding: 6px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
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
table{
  border-collapse: collapse;
  width: 100%;
}
tr:nth-child(even){
    background-color:#ddd;
}
th{
  text-align: left;
  padding: 10px;
  width: 50px;
}
td{
  text-align: left;
  align: left;
  padding: 10px;
}
a{
  text-decoration: none;
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
.addbk{
  margin-left:15px;
  padding : 4px;
  font-size: 15px;
  border: none;
  border-radius: 7px;
  background-color: lightgreen;
  font-weight: bold;
  box-shadow: 2px 3px 3px 2px black;
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
  <?php
    $id = $_GET['id_novel'];

    if (isset($_GET['cari'])){
      $key = $_GET['keyword'];
      $cari = "SELECT * FROM tb_novels where judul_novel LIKE '%$key%'" ;
    }else{
      $cari = "SELECT tb_novels.*,tb_chapters.* FROM tb_novels,tb_chapters WHERE tb_novels.id_novel = '$id' AND tb_novels.id_novel=tb_chapters.id_novel";
    }

    $tampil = mysqli_query($koneksi, $cari);
    while ($data = mysqli_fetch_assoc($tampil)){
      ?>
  <br>
  <h1><?php echo $data['judul_novel']; ?></h1>
  <hr>
<div class="row">
      <div class="column">
        <img src="foto/<?php echo $data['gambar_novel']; ?>" alt="" class="gambar" style="display:block; margin-left:auto; margin-right:auto; border-radius: 7px; box-shadow: 6px 6px 4px black;">
      </div>
</div>
      <div class="column1">
        <h2>Details</h2>
        <table>
          <tr>
            <th>Judul</th>
            <th>:</th>
            <td><?php echo $data['judul_novel']; ?></td>
          </tr>
          <tr>
            <th>Status</th>
            <th>:</th>
            <td><?php echo $data['status_novel']; ?></td>
          </tr>
          <tr>
            <th>Author</th>
            <th>:</th>
            <td><?php echo $data['author_novel']; ?></td>
          </tr>
          <tr>
            <th>Genre</th>
            <th>:</th>
            <td><?php echo $data['genre_novel']; ?></td>
          </tr>
        </table><br>
        <h2>Novel Summary</h2>
        <p style="text-align: justify; padding: 5px;"><?php echo $data['deskripsi_novel']; ?></p>
        <?php
        if (isset($_SESSION['user'])){
          $bk = 0;
          $idn = $_GET['id_novel'];
          $user = $_SESSION['user'];
          $tmpl = mysqli_query($koneksi, "SELECT * FROM tb_bookmark");
          while ($data = mysqli_fetch_assoc($tmpl)){
            if ($idn == $data['id_novel']){
              $bk+=1;
            }
          }
          if ($bk == 0){
            echo "<a href='Tambah Bookmark.php?id_novel=".$idn."'><button class='addbk'>+ <i class='far fa-bookmark'></i> Bookmark</button></a>";
          }
          else{
            echo "<span style='margin-left:15px;'><i class='far fa-bookmark'><b> Added</b></i></span>";
          }
        }
        else{
          echo "<form method='POST'><button class='addbk' name='logn'>+ <i class='far fa-bookmark'></i> Bookmark</button></form>";
          if (isset($_POST['logn'])){
            echo "<script>
              alert('Silahkan Login');
              window.location='LOGIN.php';
              </script>";
          }
        }
        ?>
        <h2>Chapters</h2>
        <table>
          <tr>
            <th>NO</th>
            <th>Chapter</th>
            <th>Waktu Penambahan</th>
          </tr>
          <?php
          $no = 1;
          $tampil = mysqli_query($koneksi, "SELECT tb_novels.*,tb_chapters.* FROM tb_novels,tb_chapters WHERE tb_novels.id_novel = '$id' AND tb_novels.id_novel=tb_chapters.id_novel");
          while ($data = mysqli_fetch_assoc($tampil)){
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo "<a href='ISI CHAPTER.php?id_novel=".$data['id_novel']." && no=".$data['no']."'>".$data['chapter']."</a>"; ?></td>
                <td><?php echo $data['tgl_masuk']; ?></td>
              </tr>
              <?php $no++; ?>
          <?php 
            } ?>
        </table>
      </div>
  <?php 
    } ?>
</div>

<div class="footer">
  <p style="padding: 10px;">&copy; 2021 - Tugas Besar</p>
</div>
</body>
</html>