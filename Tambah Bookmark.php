<?php
include('db/koneksi.php');
session_start();
            $id = $_GET['id_novel'];
            $user = $_SESSION['user'];
            $add = mysqli_query($koneksi,"INSERT INTO tb_bookmark VALUES(NULL,'$id','$user')");
            if ($add){
                echo "<script>
                    alert('Berhasil Ditambahkan');
                    window.location='NOVEL.php?id_novel=$id';
                    </script>";
            }
?>