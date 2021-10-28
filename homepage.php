<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
    }
    include 'header.php';
 ?>
    <div class="container content" style="margin-top:52px;">
        <h2>Đây là trang chủ!</h2>
    </div>
<?php include 'footer.php'?>