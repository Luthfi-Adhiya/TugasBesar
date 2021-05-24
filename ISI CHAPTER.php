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
.nb{
    border-radius: 7px;
    padding: 5px 15px;
    font-weight: bold;
    background-color: lightgreen;
    text-decoration: none;
    color: black;
    float: left;
}
.nn{
    border-radius: 7px;
    padding: 5px 15px;
    font-weight: bold;
    background-color: lightgreen;
    text-decoration: none;
    color: black;
    float: right;
}
p{
    padding: 20px;
    font-size: 20px;
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
  <?php
    $id = $_GET['id_novel'];
    $no = $_GET['no'];
    if (isset($_GET['cari'])){
      $key = $_GET['keyword'];
      $cari = "SELECT * FROM tb_novels where judul_novel LIKE '%$key%'" ;
    }else{
      $cari = "SELECT tb_novels.*,tb_chapters.* FROM tb_novels,tb_chapters WHERE tb_chapters.id_novel = '$id'AND tb_chapters.no = '$no' AND tb_novels.id_novel=tb_chapters.id_novel";
    }

    $tampil = mysqli_query($koneksi, $cari);
    while ($data = mysqli_fetch_assoc($tampil)){
      ?>
      
  <br>
  <h1><?php echo $data['chapter']; ?></h1>
  <hr>
<div class="row">
      <div class="column">
        <?php
        if ($no < 2){
            echo "<button class='nb' disabled='disabled'>BACK</button>";
        }else{
            $nob=$no;
            $nob-=1; ?>
            <button class='nb'>
            <?php echo "<a class='nb' href='ISI CHAPTER.php?id_novel=".$data['id_novel']." && no=".$nob."'>BACK</a>"; ?>
            </button>
        <?php }
        
        $b = "SELECT tb_chapters.no FROM tb_novels,tb_chapters WHERE tb_chapters.id_novel = '$id' AND tb_novels.id_novel=tb_chapters.id_novel Order BY tb_chapters.no DESC LIMIT 1";
        $no_akhir = mysqli_query($koneksi,$b);
        while ($nilai = mysqli_fetch_assoc($no_akhir)){
        $batas = $nilai['no'];
        }
        
        if ($no == $batas){
            echo "<button class='nn' disabled='disabled'>NEXT</button>";
        }else{
            $non=$no;
            $non+=1; ?>
            <button class='nn'>
            <?php echo "<a class='nn' href='ISI CHAPTER.php?id_novel=".$data['id_novel']." && no=".$non."'>NEXT</a>"; ?>
            </button>
        <?php }
        ?>
      </div>
</div>
      <div class="column1">
        <?php echo "<a class='link' href='NOVEL.php?id_novel=".$data['id_novel']."'>"; ?>
          <h4><?php echo $data['judul_novel']; ?></h4></a>
        <p style="text-align: justify; padding: 35px 7%;"><?php echo $data['isi']; ?></p>
      </div>

      <div class="column">
        <?php
        if ($no < 2){
            echo "<button class='nb' disabled='disabled'>BACK</button>";
        }else{
            $nob=$no;
            $nob-=1; ?>
            <button class='nb'>
            <?php echo "<a class='nb'href='ISI CHAPTER.php?id_novel=".$data['id_novel']." && no=".$nob."'>BACK</a>"; ?>
            </button>
        <?php }
        
        $b = "SELECT tb_chapters.no FROM tb_novels,tb_chapters WHERE tb_chapters.id_novel = '$id' AND tb_novels.id_novel=tb_chapters.id_novel Order BY tb_chapters.no DESC LIMIT 1";
        $no_akhir = mysqli_query($koneksi,$b);
        while ($nilai = mysqli_fetch_assoc($no_akhir)){
        $batas = $nilai['no'];
        }
        
        if ($no == $batas){
            echo "<button class='nn' disabled='disabled'>NEXT</button>";
        }else{
            $non=$no;
            $non+=1; ?>
            <button class='nn'>
            <?php echo "<a class='nn'href='ISI CHAPTER.php?id_novel=".$data['id_novel']." && no=".$non."'>NEXT</a>"; ?>
            </button>
        <?php }
        ?>
      </div>
  <?php 
    } ?>
</div>

<div class="footer">
  <p style="padding: 10px; font-size: 16px;">&copy; 2021 - Tugas Besar</p>
</div>
</body>
</html>