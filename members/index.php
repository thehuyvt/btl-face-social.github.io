<?php
    session_start();
    if(!isset($_SESSION['loginSuccess'])){
        header("Location:../index.php");
    }
    include 'mheader.php';
 ?>
    <div class="container content" style="margin-top:52px;">
        <h2>Đây là trang chủ!</h2>
        <a href="../logout.php" class="btn btn-primary btn-lg btn-block">Đăng xuất</a>
    </div>
<?php include 'mfooter.php'?>