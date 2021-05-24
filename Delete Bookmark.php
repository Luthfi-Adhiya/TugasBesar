<?php
include('db/koneksi.php');
session_start();
            $id = $_GET['id_novel'];
            $user = $_SESSION['user'];
            $del = mysqli_query($koneksi,"DELETE FROM `tb_bookmark` WHERE username='$user' AND id_novel='$id'");
            if ($del){
                echo "<script>
                    alert('Berhasil Dihapus');
                    window.location='BOOKMARK.php';
                    </script>";
            }
?>